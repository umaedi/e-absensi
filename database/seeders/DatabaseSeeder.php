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
        //     'jabatan'    => 'Other',
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
                'jabatan'    => 'Kepala Dinas Komunikasi dan Informatika',
                'nip'       => '196312221986092003',
                'name'      => 'Dra. DESIA KUSUMAYUDA,M.Si',
                'email'     => 'kadis@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'   => 'Sekretaris Dinas Komunikasi dan Informatika',
                'nip'       => '197605091996031000',
                'name'      => 'ANDI WANTONI, S.H., M.H.',
                'email'     => 'sekretaris@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '1232353243',
                'name'      => 'kominfo',
                'email'     => 'kominfo1@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '12324532523428910',
                'name'      => 'kominfo',
                'email'     => 'kominfo2@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '1232342332538910',
                'name'      => 'kominfo',
                'email'     => 'kominfo3@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '12342412138910',
                'name'      => 'kominfo',
                'email'     => 'kominfo4@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '1281242145678910',
                'name'      => 'kominfo',
                'email'     => 'kominfo5@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '123423432578910',
                'name'      => 'kominfo',
                'email'     => 'kominfo6@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '1234234292578910',
                'name'      => 'kominfo',
                'email'     => 'kominfo7@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '1234523532438910',
                'name'      => 'kominfo',
                'email'     => 'kominfo8@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '1234436235228910',
                'name'      => 'kominfo',
                'email'     => 'kominfo9@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '120878123128910',
                'name'      => 'kominfo',
                'email'     => 'kominfo10@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '123836235128910',
                'name'      => 'kominfo',
                'email'     => 'kominfo11@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '12349352351228910',
                'name'      => 'kominfo',
                'email'     => 'kominfo12@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '123484325121910',
                'name'      => 'kominfo',
                'email'     => 'kominfo13@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '123300234218910',
                'name'      => 'kominfo',
                'email'     => 'kominfo14@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '123413648324210',
                'name'      => 'kominfo',
                'email'     => 'kominfo15@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '1234057489324210',
                'name'      => 'kominfo',
                'email'     => 'kominfo16@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '1234521118912342',
                'name'      => 'kominfo',
                'email'     => 'kominfo17@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '1234567956121245',
                'name'      => 'kominfo',
                'email'     => 'kominfo18@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '12345538778915242',
                'name'      => 'kominfo',
                'email'     => 'kominfo19@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Other',
                'nip'       => '12345608568241310',
                'name'      => 'kominfo',
                'email'     => 'kominfo20@gmail.com',
                'password'  => 'kominfo123',
            ],
            [
                'opd_id'  => 1,
                'jabatan'    => 'Programmer',
                'nip'       => '123456085623532910',
                'name'      => 'Dev KH',
                'email'     => 'devkh@gmail.com',
                'password'  => 'kominfo123',
            ],
        ];

        foreach ($pegawai as $value) {
            \App\Models\Pegawai::create($value);
            # code...
        }
    }
}
