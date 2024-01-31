<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->id('id_tanggapan');
            $table->foreignId('id_pengaduan')->constrained('pengaduans', 'id_pengaduan');
            $table->date('tgl_tanggapan');
            $table->text('tanggapan');
            $table->foreignId('id_petugas')->constrained('petugases', 'id_petugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapans');
    }
};
