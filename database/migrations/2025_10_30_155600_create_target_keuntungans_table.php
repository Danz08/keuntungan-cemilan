<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetKeuntungansTable extends Migration
{
    public function up()
    {
        Schema::create('target_keuntungan', function (Blueprint $table) {
            $table->id();
            $table->string('periode', 20);
            $table->decimal('target_nominal', 15, 2);
            $table->decimal('keuntungan_tercapai', 15, 2)->default(0);
            $table->decimal('persentase_pencapaian', 5, 2)->default(0);
            $table->enum('status', ['Belum Tercapai', 'Tercapai'])->default('Belum Tercapai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('target_keuntungan');
    }
}
