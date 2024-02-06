<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spps')->insert([
            "id_spp" => random_int(1, 20),
            "tahun" => random_int(2000, 2006),
            "nominal" => random_int(1000000, 5000000),
        ]);
    }
}
