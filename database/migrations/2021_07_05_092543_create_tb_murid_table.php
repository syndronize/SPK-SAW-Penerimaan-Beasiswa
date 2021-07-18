<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_murid', function (Blueprint $table) {
            $table->id('id_murid');
            $table->string('nama_murid')->nullable();
            $table->string('nisn_murid')->nullable();
            $table->enum('jk_murid',['Laki-Laki','Perempuan'])->nullable();
            $table->string('kelas_murid')->nullable();
            $table->string('nohp_murid')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_murid');
    }
}
