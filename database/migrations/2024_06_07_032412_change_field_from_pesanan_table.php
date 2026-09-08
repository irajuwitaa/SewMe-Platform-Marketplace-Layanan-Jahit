<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            // Ubah kolom pembayaran dan status menjadi nullable
            $table->string('pembayaran')->nullable()->change();
            $table->integer('status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            // Revert kolom pembayaran dan status menjadi tidak nullable (jika diperlukan)
            // Tidak perlu dilakukan jika kolom sebelumnya tidak memiliki opsi nullable
            $table->string('pembayaran')->nullable(false)->change();
            $table->integer('status')->nullable(false)->change();
        });
    }
};
