<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TanggapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petugasID = DB::table('petugases')->insertGetId([
            "id_petugas" => "01",
            "nama_petugas" => "Achmad Tirto Sudiro",
            "username" => "achmad",
            "password" => substr(md5("achmad"), 0, 32),
            "telp" => "0895320316384",
            "level" => "admin",
        ]);

        $pengaduanID = DB::table('pengaduans')->insertGetId([
            "id_pengaduan" => "01",
            "tgl_pengaduan" => now(),
            "nik" => "3215050909060005",
            "isi_laporan" => "laporan 1",
            "foto" => "foto01",
            "status" => "proses",
        ]);

        DB::table('tanggapans')->insert([
            "id_tanggapan" => random_int(1, 20),
            "id_pengaduan" => $pengaduanID,
            "tgl_tanggapan" => now(),
            "tanggapan" => Str::random(255),
            "id_petugas" => $petugasID,

        ]);
    }
}
