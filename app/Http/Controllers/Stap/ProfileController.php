<?php

namespace App\Http\Controllers\Stap;

use App\Http\Controllers\Controller;
use App\Models\Stap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $data['stap'] = auth()->guard('stap')->user();
        $data['title']  = 'Profile';
        return view('stap.profile.index', compact('data'));
    }

    public function updateProfile()
    {
        $stap = auth()->guard('stap')->user();
        if (\request()->ajax()) {
            if (\request()->file('image')) {
                $image = request()->file('image');
                $image->storeAs('public/stap/img/profile', $image->hashName());
                Storage::delete('public/stap/img/profile/' . $stap->image);
            } else {
                $image = "";
            }

            $stap = Stap::findOrfail($stap->id);
            $stap->update([
                'name'  => request()->name,
                'image' => $image ? $image->hashName() : $stap->image,
            ]);
            return response()->json([
                'success'   => true,
                'message'   => 'Profil berhasil di perbaharui!'
            ]);
        }
    }

    public function updatePassword()
    {
        $stap = auth()->guard('stap')->user();
        if (\request()->ajax()) {
            $stap =  Stap::findOrfail($stap->id);
            $stap->update(\request()->except('_token'));
            return response()->json([
                'success'   => true,
                'message'   => 'Password berhasil di perbaharui!'
            ]);
        }
    }
}
