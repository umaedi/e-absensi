<?php

namespace App\Http\Controllers\Stap;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        $data['tanggal'] = Carbon::now()->format('d M Y');
        return view('stap.history.index', compact('data'));
    }
}
