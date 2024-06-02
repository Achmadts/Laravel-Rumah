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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("username", 25);
            $table->string("email", 255)->unique();
            $table->string("nama_petugas", 35);
            $table->string("password", 255)->nullable();
            $table->enum("level", ["admin", "petugas"])->default("petugas");
            $table->string("provider")->nullable();
            $table->string("provider_id")->nullable();
            $table->string("provider_token")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
