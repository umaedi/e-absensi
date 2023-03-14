<?php

namespace App\Http\Controllers\Stap;

use Carbon\Carbon;
use App\Models\Cuty;
use App\Models\Absent;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        $stap_id = auth()->guard('stap')->user()->id;
        if (\request()->ajax()) {
            $absent = Absent::query();

            if (\request()->tanggal_awal && \request()->tanggal_akhir) {
                $tgl_awal = Carbon::parse(\request()->tanggal_awal)->toDateTimeString();
                $tgl_akhir = Carbon::parse(\request()->tanggal_akhir)->toDateTimeString();
                $absent->whereBetween('created_at', [$tgl_awal, $tgl_akhir]);
            }

            $data['table'] = $absent->where('stap_id', $stap_id)->paginate(12);

            return view('stap.history._data_table_history', $data);
        }

        $data['tanggal'] = Carbon::now()->format('d M Y');
        $data['hadir'] = Absent::where('stap_id', $stap_id)->count();
        $data['terlambat'] = Absent::where('stap_id', $stap_id)->where('status', '2')->count();
        $data['sakit'] = Cuty::where('stap_id', $stap_id)->where('status', '1')->count();
        $data['cuty'] = Cuty::where('stap_id', $stap_id)->where('status', '2')->count();
        $data['title'] = 'Data History Absensi';

        return view('stap.history.index', compact('data'));
    }

    public function print()
    {
        $stap = auth()->guard('stap')->user();
        if (\request()->ajax()) {
            $absent = Absent::query();

            if (\request()->tanggal_awal && \request()->tanggal_akhir) {
                $tgl_awal = Carbon::parse(\request()->tanggal_awal)->toDateTimeString();
                $tgl_akhir = Carbon::parse(\request()->tanggal_akhir)->toDateTimeString();
                $absent->whereBetween('created_at', [$tgl_awal, $tgl_akhir]);
            }

            $data['table'] = $absent->where('stap_id', $stap->id)->paginate();

            return view('stap.history._data_table_print', $data);
        }

        $data['title'] = 'Data Absensi ' . $stap->name;
        return view('stap.history.print', compact('data'));
    }
}
