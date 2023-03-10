<?php

namespace App\Http\Controllers\Stap;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Absent;

class HistoryController extends Controller
{
    public function index()
    {
        $stap_id = auth()->guard('stap')->user()->id;
        if (\request()->ajax()) {
            $absent = Absent::query();

            if (\request()->tanggal_awal && \request()->tanggal_akhir) {
                $absent->where('tanggal', '>=', request()->tanggal_awal)->where('tanggal', '<=', request()->tanggal_akhir);
            }

            $data['table'] = $absent->where('stap_id', $stap_id)->paginate(12);

            return view('stap.history._data_table_history', $data);
        }

        $data['tanggal'] = Carbon::now()->format('d M Y');
        $data['hadir'] = Absent::where('stap_id', $stap_id)->count();
        $data['terlambat'] = Absent::where('stap_id', $stap_id)->where('jam_masuk', 'like', '%' . '10' . '%')->count();

        return view('stap.history.index', compact('data'));
    }

    public function print()
    {
        $stap = auth()->guard('stap')->user();
        if (\request()->ajax()) {
            $absent = Absent::query();

            if (\request()->tanggal_awal && \request()->tanggal_akhir) {
                $absent->where('tanggal', '>=', request()->tanggal_awal)->where('tanggal', '<=', request()->tanggal_akhir);
            }

            $data['table'] = $absent->where('stap_id', $stap->id)->paginate();

            return view('stap.history._data_table_print', $data);
        }

        $data['title'] = 'Data Absensi ' . $stap->name;
        return view('stap.history.print', compact('data'));
    }
}
