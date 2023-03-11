<?php

namespace App\Http\Controllers\Stap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    public function index()
    {
        return view('stap.cuti.index');
    }
}
