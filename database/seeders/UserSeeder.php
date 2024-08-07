<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "id" => random_int(1, 1000),
            "username" => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            "nama_petugas" => Str::random(10),
            "password" => bcrypt('achmad'),
            "level" => "petugas",
        ]);
    }
}
