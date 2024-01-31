<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('masyarakats')->insert([
            "nik" => Str::random(16),
            "nama" => Str::random(35),
            "username" => Str::random(25),
            "password" => substr(md5(Str::random(32)), 0, 32),
            "telp" => Str::random(13),
        ]);
    }
}
