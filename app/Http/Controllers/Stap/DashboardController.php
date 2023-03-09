<?php

namespace App\Http\Controllers\Stap;

use App\Http\Controllers\Controller;
use App\Models\Absent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $stap_id = auth()->guard('stap')->user()->id;

        if (\request()->ajax()) {
            $absent = Absent::query();

            if (\request()->bulan) {
                $absent->where('bulan', request()->bulan);
            }

            $data['table'] =  $absent->where('stap_id', $stap_id)->latest()->limit(5)->get();
            return view('stap.dashboard._data_table_absensi', $data);
        }

        $data['absen'] = Absent::where('stap_id', $stap_id)->where('tanggal', date('d-m-Y'))->first();
        $data['tanggal'] = Carbon::now()->format('d M Y');
        $data['hadir'] = Absent::where('stap_id', $stap_id)->count();
        $data['terlambat'] = Absent::where('stap_id', $stap_id)->where('jam_masuk', 'like', '%' . '10' . '%')->count();

        $data['title'] = 'Dashboard Stap';
        return view('stap.dashboard.index', compact('data'));
    }
}
