<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianBahansTable extends Migration
{
    public function up()
    {
        Schema::create('pembelian_bahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan', 100);
            $table->date('tanggal_pembelian');
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('total_harga', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembelian_bahan');
    }
}
