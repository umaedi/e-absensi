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
                'name'      => 'User',
                'email'     => 'user1@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123245678910',
                'name'      => 'User',
                'email'     => 'user2@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12345632538910',
                'name'      => 'User',
                'email'     => 'user3@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123452138910',
                'name'      => 'User',
                'email'     => 'user4@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '128745678910',
                'name'      => 'User',
                'email'     => 'user5@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12346678910',
                'name'      => 'User',
                'email'     => 'user6@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12345692578910',
                'name'      => 'User',
                'email'     => 'user7@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '1234567438910',
                'name'      => 'User',
                'email'     => 'user8@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '1234436328910',
                'name'      => 'User',
                'email'     => 'user9@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12087878910',
                'name'      => 'User',
                'email'     => 'user10@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12383678910',
                'name'      => 'User',
                'email'     => 'user11@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123493578910',
                'name'      => 'User',
                'email'     => 'user12@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '1234848910',
                'name'      => 'User',
                'email'     => 'user13@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12330078910',
                'name'      => 'User',
                'email'     => 'user14@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123413648910',
                'name'      => 'User',
                'email'     => 'user15@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123405748910',
                'name'      => 'User',
                'email'     => 'user16@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '1234521118910',
                'name'      => 'User',
                'email'     => 'user17@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '123456795610',
                'name'      => 'User',
                'email'     => 'user18@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12345538778910',
                'name'      => 'User',
                'email'     => 'user19@gmail.com',
                'password'  => 'user123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 1,
                'nip'       => '12345608568910',
                'name'      => 'User',
                'email'     => 'user20@gmail.com',
                'password'  => 'user123',
            ],
        ];

        foreach ($pegawai as $value) {
            \App\Models\Pegawai::create($value);
            # code...
        }
    }
}
