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
        Schema::table('pesanan', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('produk_id'); // Menambahkan kolom user_id
            $table->text('catatan')->nullable()->after('user_id'); // Menambahkan kolom catatan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropColumn('user_id'); // Menghapus kolom user_id
            $table->dropColumn('catatan'); // Menghapus kolom catatan
        });
    }
};
