<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kriteria', function (Blueprint $table) {
            $table->id('id_kriteria');
            $table->integer('id_murid');
            $table->integer('tanggungan_kriteria')->nullable();
            $table->integer('pendapatan_kriteria')->nullable();
            $table->float('rata_kriteria')->nullable();
            $table->float('transportasi_kriteria')->nullable();
            $table->float('nilai_akhir_kriteria')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kriteria');
    }
}
