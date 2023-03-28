<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kepalaopd;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $opd = [
            ['nama_opd'    => 'Dinas Kominfo'],
            ['nama_opd'    => 'Dinas Perpustakaan dan Kearsipan'],
            ['nama_opd'    => 'Dinas Lingkungan Hidup dan Kehutanan'],
            ['nama_opd'    => 'Dinas Ketahanan Pangan'],
            ['nama_opd'    => 'Dinas Kesehatan'],
        ];

        foreach ($opd as $value) {
            \App\Models\Opd::create($value);
        }

        // Kepalaopd::create([
        //     'opd_id'  => 1,
        //     'jabatan'    => 1,
        //     'nip'       => '12345678910',
        //     'name'      => 'User',
        //     'email'     => 'kadis@gmail.com',
        //     'password'  => 'kadis23',
        // ]);

        // $jabatan = [
        //     ['nama_jabatan' => 'Kepala Opd'],
        //     ['nama_jabatan' => 'Sekretaris'],
        //     ['nama_jabatan' => 'Kabid'],
        //     ['nama_jabatan' => 'Kasi'],
        // ];

        // foreach ($jabatan as $value) {
        //     # code...
        //     \App\Models\Jabatan::create($value);
        // }

        $pegawai = [
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12345678910',
                'name'      => 'kominfo',
                'email'     => 'kominfo1@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123245678910',
                'name'      => 'kominfo',
                'email'     => 'kominfo2@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12345632538910',
                'name'      => 'kominfo',
                'email'     => 'kominfo3@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123452138910',
                'name'      => 'kominfo',
                'email'     => 'kominfo4@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '128745678910',
                'name'      => 'kominfo',
                'email'     => 'kominfo5@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12346678910',
                'name'      => 'kominfo',
                'email'     => 'kominfo6@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12345692578910',
                'name'      => 'kominfo',
                'email'     => 'kominfo7@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '1234567438910',
                'name'      => 'kominfo',
                'email'     => 'kominfo8@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '1234436328910',
                'name'      => 'kominfo',
                'email'     => 'kominfo9@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12087878910',
                'name'      => 'kominfo',
                'email'     => 'kominfo10@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12383678910',
                'name'      => 'kominfo',
                'email'     => 'kominfo11@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123493578910',
                'name'      => 'kominfo',
                'email'     => 'kominfo12@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '1234848910',
                'name'      => 'kominfo',
                'email'     => 'kominfo13@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12330078910',
                'name'      => 'kominfo',
                'email'     => 'kominfo14@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123413648910',
                'name'      => 'kominfo',
                'email'     => 'kominfo15@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123405748910',
                'name'      => 'kominfo',
                'email'     => 'kominfo16@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '1234521118910',
                'name'      => 'kominfo',
                'email'     => 'kominfo17@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123456795610',
                'name'      => 'kominfo',
                'email'     => 'kominfo18@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12345538778910',
                'name'      => 'kominfo',
                'email'     => 'kominfo19@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12345608568910',
                'name'      => 'kominfo',
                'email'     => 'kominfo20@gmail.com',
                'password'  => 'kominfo123',
            ],
        ];

        foreach ($pegawai as $value) {
            \App\Models\Pegawai::create($value);
            # code...
        }
    }
}
