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
            $absent = Absent::query();
            $tanggal = $absent->where('stap_id', 1)->pluck('tanggal')->first();

            if ($tanggal == date('d-m-Y')) {

                $img = $request->image;
                $folderPath = "public/stap/img/";

                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];

                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.jpeg';

                $file = $folderPath . $fileName;
                Storage::put($file, $image_base64);

                $stap_id = 1;
                $dinas_id = 1;

                try {
                    $absent->where('stap_id', 1)->update([
                        'stap_id'   => $stap_id,
                        'dinas_id'  => $dinas_id,
                        'tanggal'   => date('d-m-Y'),
                        'jam_pulang' => date('H:i:s'),
                        'lat_long_pulang'   => $request->latLong,
                        'photo_pulang'     => $fileName,
                    ]);
                } catch (QueryException $e) {
                    DB::rollBack();

                    return response()->json([
                        'success'   => false,
                        'message'   => 'Mohon Maaf Absen gagal!'
                    ], 403);
                }

                DB::commit();
                return response()->json([
                    'success'   => true,
                    'message'   => 'Anda berhasil mengisi absen'
                ]);
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

            $stap_id = 1;
            $dinas_id = 1;

            try {
                Absent::create([
                    'stap_id'   => $stap_id,
                    'dinas_id'  => $dinas_id,
                    'tanggal'   => date('d-m-Y'),
                    'jam_masuk' => date('H:i:s'),
                    'lat_long_masuk'   => $request->latLong,
                    'photo_masuk'     => $fileName,
                ]);
            } catch (QueryException $e) {
                DB::rollBack();

                return response()->json([
                    'success'   => false,
                    'message'   => 'Mohon Maaf Absen gagal!'
                ], 403);
            }

            DB::commit();
            return response()->json([
                'success'   => true,
                'message'   => 'Anda Berhasil Mengisi Absen'
            ]);
        }
    }
}
