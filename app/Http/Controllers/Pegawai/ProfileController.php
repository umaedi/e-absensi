<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $data['pegawai'] = auth()->guard('pegawai')->user();
        $data['title']  = 'Profile';
        return view('pegawai.profile.index', $data);
    }

    public function updateProfile()
    {
        $pegawai = auth()->guard('pegawai')->user();
        if (\request()->ajax()) {
            if (\request()->file('image')) {
                $image = request()->file('image');
                $image->storeAs('public/pegawai/img/profile', $image->hashName());

                if ($pegawai->image !== 'avatar.jpg') {
                    Storage::delete('public/pegawai/img/profile/' . $pegawai->image);
                }
            } else {
                $image = "";
            }

            $pegawai = Pegawai::findOrfail($pegawai->id);
            $pegawai->update([
                'nip'   => request()->nip,
                'name'  => request()->name,
                'jabatan'  => request()->jabatan,
                'no_tlp'  => request()->no_tlp,
                'image' => $image ? $image->hashName() : $pegawai->image,
            ]);
            return response()->json([
                'success'   => true,
                'message'   => 'Profil berhasil di perbaharui!'
            ]);
        }
    }

    public function updatePassword()
    {
        $pegawai = auth()->guard('pegawai')->user();
        if (\request()->ajax()) {
            $pegawai =  Pegawai::findOrfail($pegawai->id);
            $pegawai->update([
                'email'     => request()->email ? request()->email : $pegawai->email,
                'password'  => request()->password ? request()->password : $pegawai->password
            ]);
            return response()->json([
                'success'   => true,
                'message'   => 'Password berhasil di perbaharui!'
            ]);
        }
    }
}
