<?php

namespace App\Http\Controllers\Stap;

use App\Http\Controllers\Controller;
use App\Models\Cuty;
use Illuminate\Http\Request;

class CutyController extends Controller
{
    public function index()
    {
        $stap_id = auth()->guard('stap')->user()->id;
        if (\request()->ajax()) {
            $cuty = Cuty::query();

            $data['table']  = $cuty->where('stap_id', $stap_id)->paginate(2);
            return view('stap.cuty._data_table_cuty', $data);
        }
        return view('stap.cuty.index');
    }

    public function store()
    {
        if (\request()->ajax()) {
            $cuty = Cuty::create(\request()->except('_token'));
            return response()->json([
                'success'   => true,
                'message'   => 'Permohonan cuti berhasil dibuat',
            ]);
        }
    }
}
