<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("kelases")->insert([
            "id_kelas" => random_int(1, 20),
            "nama_kelas" => Str::random(10),
            "kompetensi_keahlian" =>Str::random(50)
        ]);
    }
}
