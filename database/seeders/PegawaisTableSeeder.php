<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawai = [

            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => '34634632423452',
                'name'      => 'Kominfo',
                'email'     => 'kominfo22@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => 'x47435343xx235r',
                'name'      => 'Kominfo',
                'email'     => 'kominfo23@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => 'xx12342xx235r',
                'name'      => 'Kominfo',
                'email'     => 'kominfo24@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => '2352wqrwq43xxxx235r',
                'name'      => 'Kominfo',
                'email'     => 'kominfo24@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => 'x23523432xxx235r',
                'name'      => 'Kominfo',
                'email'     => 'kominfo25@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => 'x235347342xxx235r',
                'name'      => 'Kominfo',
                'email'     => 'kominfo26@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => 'x08027xxx235r',
                'name'      => 'Kominfo',
                'email'     => 'kominfo27@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => 'xx23523421xx235r',
                'name'      => 'Kominfo',
                'email'     => 'kominfo28@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => 'xx235634xx235r',
                'name'      => 'Kominfo',
                'email'     => 'kominfo29@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Kominfo',
                'nip'       => 'xxx46325745654x235r',
                'name'      => 'Kominfo',
                'email'     => 'kominfo30@gmail.com',
                'password'  => 'kominfo123',
            ],
        ];

        foreach ($pegawai as $value) {
            \App\Models\Pegawai::create($value);
            # code...
        }
    }
}
