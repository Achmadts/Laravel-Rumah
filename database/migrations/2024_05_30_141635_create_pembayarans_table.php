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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id("id_pembayaran");
            $table->foreignId("user_id")->constrained("users");
            $table->char("nisn", 10);
            $table->foreign("nisn")->references("nisn")->on("siswas");
            $table->date("tgl_bayar");
            $table->string("bulan_dibayar", 9);
            $table->string("tahun_dibayar", 4);
            $table->foreignId("id_spp")->references("id_spp")->on("spps");
            $table->integer("jumlah_bayar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign(['nisn']);
        });

        Schema::dropIfExists('pembayarans');
    }
};