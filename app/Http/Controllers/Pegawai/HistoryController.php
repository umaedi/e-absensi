<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use App\Models\Cuty;
use App\Models\Absent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        $pegawai_id = auth()->guard('pegawai')->user()->id;
        if (\request()->ajax()) {
            $absent = Absent::query();

            if (\request()->tanggal_awal && \request()->tanggal_akhir) {
                $tgl_awal = Carbon::parse(\request()->tanggal_awal)->toDateTimeString();
                $tgl_akhir = Carbon::parse(\request()->tanggal_akhir)->toDateTimeString();
                $absent->whereBetween('created_at', [$tgl_awal, $tgl_akhir]);
            }

            $data['table'] = $absent->where('pegawai_id', $pegawai_id)->latest()->paginate(12);
            return view('pegawai.history._data_table_history', $data);
        }

        $absent = Absent::query();
        $cuty = Cuty::query();

        $data['tanggal'] = Carbon::now()->format('d M Y');
        $data['hadir'] = $absent->where('pegawai_id', $pegawai_id)->count();
        $data['terlambat'] = $absent->where('pegawai_id', $pegawai_id)->where('status', '2')->count();
        $data['sakit'] = $cuty->where('pegawai_id', $pegawai_id)->where('status', '2')->count();
        $data['cuty'] = $cuty->where('pegawai_id', $pegawai_id)->where('status', '3')->count();
        $data['title'] = 'Data History Absensi';

        return view('pegawai.history.index', compact('data'));
    }

    public function print(Request $request)
    {
        $pegawai = auth()->guard('pegawai')->user();
        if (\request()->ajax()) {
            $absent = Absent::query();
            if ($request->tanggal_awal && $request->tanggal_akhir) {
                $tgl_awal = Carbon::parse(\request()->tanggal_awal)->toDateTimeString();
                $tgl_akhir = Carbon::parse(\request()->tanggal_akhir)->toDateTimeString();
                $absent->whereBetween('created_at', [$tgl_awal, $tgl_akhir]);
            }

            $data['table'] = $absent->where('pegawai_id', $pegawai->id)->paginate();

            return view('pegawai.history._data_table_print', $data);
        }

        $data['title'] = 'Data Absensi ' . $pegawai->name;
        return view('pegawai.history.print', compact('data'));
    }
}
