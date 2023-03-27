<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class loginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $pegawai = Pegawai::where([
            'email'     => $request->email,
            'password'  => $request->password
        ])->first();

        if (!$pegawai) {
            return back()->with('error', 'Email atau Paasword salah');
        }

        if ($pegawai->role === 3 || $pegawai->role === 2) {
            auth()->guard('opd')->login($pegawai, 'remember');
        }

        auth()->guard('pegawai')->login($pegawai, 'remember');

        return redirect()->intended('/pegawai/dashboard');
    }
}
