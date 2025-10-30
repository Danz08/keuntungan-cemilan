<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('pembelian_bahan', function (Blueprint $table) {
        $table->dropColumn('total_harga');
    });
}

public function down(): void
{
    Schema::table('pembelian_bahan', function (Blueprint $table) {
        $table->decimal('total_harga', 15, 2)->nullable();
    });
}

};
