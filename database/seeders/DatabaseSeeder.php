<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori_nama' => "Undangan",
        ]);
        DB::table('kategoris')->insert([
            'kategori_nama' => "Pengumuman",
        ]);
        DB::table('kategoris')->insert([
            'kategori_nama' => "Nota Dinas",
        ]);
        DB::table('kategoris')->insert([
            'kategori_nama' => "Pemberitahuan",
        ]);
    }
}
