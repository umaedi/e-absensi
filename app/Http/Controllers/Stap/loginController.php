<?php

namespace App\Http\Controllers\Stap;

use App\Http\Controllers\Controller;
use App\Models\Stap;
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

        $stap = Stap::where([
            'email'     => $request->email,
            'password'  => $request->password
        ])->first();

        if (!$stap) {
            return back()->with('error', 'Email atau Paasword salah');
        }

        auth()->guard('stap')->login($stap, 'remember');

        return redirect()->intended('/stap/dashboard');
    }
}
