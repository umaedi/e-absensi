<?php

namespace App\Http\Controllers\Stap;

use App\Http\Controllers\Controller;
use App\Models\Cuty;
use Carbon\Carbon;

class CutyController extends Controller
{
    public function index()
    {
        $stap_id = auth()->guard('stap')->user()->id;
        if (\request()->ajax()) {
            $cuty = Cuty::query();

            if (\request()->tanggal_awal && \request()->tanggal_akhir) {
                $tgl_awal = Carbon::parse(\request()->tanggal_awal)->toDateTimeString();
                $tgl_akhir = Carbon::parse(\request()->tanggal_akhir)->toDateTimeString();
                $cuty->whereBetween('created_at', [$tgl_awal, $tgl_akhir])->get();
            }

            $data['table']  = $cuty->where('stap_id', $stap_id)->paginate(6);
            return view('stap.cuty._data_table_cuty', $data);
        }

        $data['title']  = 'Data Permohonan Cuty';
        return view('stap.cuty.index', compact('data'));
    }

    public function store()
    {
        if (\request()->ajax()) {
            $cuty = Cuty::create(\request()->except('_token'));
            return response()->json([
                'success'   => true,
                'message'   => 'Permohonan Cuty Berhasil Dibuat',
            ]);
        }
    }

    public function update()
    {
        $stap_id = auth()->guard('stap')->user()->id;
        if (\request()->ajax()) {
            $cuty = Cuty::findOrfail($stap_id);

            $cuty->where('id', request()->cuty_id)->update([
                'tanggal_awal'  => request()->tanggal_awal ? request()->tanggal_awal : $cuty->tanggal_awal,
                'tanggal_akhir' => request()->tanggal_akhir ? request()->tanggal_akhir : $cuty->tanggal_akhir,
                'tanggal_masuk' => request()->tanggal_masuk ? request()->tanggal_masuk : $cuty->tanggal_masuk,
                'jumlah_izin'   => request()->jumlah_izin ? request()->jumlah_izin : $cuty->jumlah_izin,
                'keterangan'    => request()->keterangan ? request()->keterangan : $cuty->keterangan,
                'status'        => request()->status ? request()->status : $cuty->status,
            ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Permohonan Cuty Berhasil Diperbaharui',
            ]);
        }
    }
}
