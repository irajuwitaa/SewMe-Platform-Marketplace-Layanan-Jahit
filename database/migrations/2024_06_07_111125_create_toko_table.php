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
    Schema::create('toko', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('nama_toko')->nullable();
        $table->string('alamat_toko')->nullable();
        $table->string('link_google_map')->nullable();
        $table->string('no_telp')->nullable();
        $table->string('email')->nullable();
        $table->string('password')->nullable();
        $table->time('jam_buka')->nullable();
        $table->time('jam_tutup')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko');
    }
};
