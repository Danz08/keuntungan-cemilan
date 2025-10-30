<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('pembelian_bahan', function (Blueprint $table) {
        $table->decimal('total', 15, 2)->after('harga_satuan');
    });
}

public function down(): void
{
    Schema::table('pembelian_bahan', function (Blueprint $table) {
        $table->dropColumn('total');
    });
}

};
