<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\Stap::create([
            'dinas_id'  => 1,
            'name'      => 'User',
            'email'     => 'user@gmail.com',
            'password'  => 'user123',
        ]);

        $dinas = [
            ['nama_dinas'    => 'Dinas Kominfo'],
            ['nama_dinas'    => 'Dinas Perpustakaan dan Kearsipan'],
            ['nama_dinas'    => 'Dinas Lingkungan Hidup dan Kehutanan'],
            ['nama_dinas'    => 'Dinas Ketahanan Pangan'],
            ['nama_dinas'    => 'Dinas Kesehatan'],
        ];

        foreach ($dinas as $value) {
            \App\Models\Dinas::create($value);
        }
    }
}
