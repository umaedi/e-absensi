<?php

namespace App\Http\Controllers\Opd;

use App\Http\Controllers\Controller;
use App\Imports\PegawaiImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('opd.pegawai.import');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        Excel::import(new PegawaiImport(), $request->file('file'));

        return back();
    }
}
