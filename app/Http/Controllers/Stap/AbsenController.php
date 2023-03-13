<?php

namespace App\Http\Controllers\Stap;

use App\Models\Absent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class AbsenController extends Controller
{
    public function index()
    {
        return view('stap.absent.index');
    }

    public function store(Request $request)
    {
        if (\request()->ajax()) {
            $stap = auth()->guard('stap')->user();

            $absent = Absent::where('stap_id', $stap->id)->latest()->first();

            if ($absent && $absent->tanggal == date('d-m-Y')) {

                if (strtotime(date('H:i:s')) < strtotime('15:30:00')) {
                    return response()->json([
                        'success'   => false,
                        'message'   => 'Mohon Maaf Absen Sore Belum Dibuka!'
                    ], 403);
                }

                $img = $request->image;
                $folderPath = "public/stap/img/";

                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];

                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.jpeg';

                $file = $folderPath . $fileName;
                Storage::put($file, $image_base64);

                try {
                    $absent->where('stap_id', 1)->update([
                        'stap_id'   => $stap->id,
                        'dinas_id'  => $stap->dinas->id,
                        'tanggal'   => date('d-m-Y'),
                        'bulan'     => date('m'),
                        'tahun'     => date('Y'),
                        'jam_pulang' => date('H:i:s'),
                        'lat_long_pulang'   => $request->latLong,
                        'photo_pulang'     => $fileName,

                    ]);
                } catch (QueryException $e) {
                    return response()->json([
                        'success'   => false,
                        'message'   => 'Mohon Maaf Absen gagal!'
                    ], 403);
                }

                return response()->json([
                    'success'   => true,
                    'message'   => 'Anda Berhasil Mengisi Absen Sore'
                ]);
            } else {
                $img = $request->image;
                $folderPath = "public/stap/img/";

                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];

                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.jpeg';

                $file = $folderPath . $fileName;
                Storage::put($file, $image_base64);

                if (strtotime(date('H:i:s')) > strtotime('10:00:00')) {
                    $status = '2';
                } else {
                    $status = '1';
                }

                try {
                    Absent::create([
                        'stap_id'   => $stap->id,
                        'dinas_id'  => $stap->dinas->id,
                        'tanggal'   => date('d-m-Y'),
                        'bulan'     => date('m'),
                        'tahun'     => date('Y'),
                        'jam_masuk' => date('H:i:s'),
                        'lat_long_masuk'   => $request->latLong,
                        'photo_masuk'     => $fileName,
                        'status' => $status,
                    ]);
                } catch (QueryException $e) {
                    Storage::delete('public/stap/img' . $fileName);

                    return response()->json([
                        'success'   => false,
                        'message'   => 'Internal Server Error!'
                    ], 500);
                }

                return response()->json([
                    'success'   => true,
                    'message'   => 'Anda Berhasil Mengisi Absen Pagi'
                ]);
            }
        }
    }
}
