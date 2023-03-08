<?php

namespace App\Http\Controllers\Stap;

use App\Http\Controllers\Controller;
use App\Models\Absent;
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
        if (\request()->ajax()) {
            $stap_id = 1;
            $absent = Absent::query();

            if (\request()->bulan) {
                $absent->where('bulan', request()->bulan);
            }

            $data['table'] =  $absent->where('stap_id', $stap_id)->latest()->limit(5)->get();
            return view('stap.dashboard._data_table_absensi', $data);
        }

        $data['absen'] = Absent::where('stap_id', 1)->where('tanggal', date('d-m-Y'))->first();
        $data['title'] = 'Dashboard Stap';
        return view('stap.dashboard.index', compact('data'));
    }
}
