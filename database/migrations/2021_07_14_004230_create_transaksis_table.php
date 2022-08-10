<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('noInduk');
            $table->string('kelas');
            $table->integer('pendaftaran')->nullable();
            $table->integer('seragam')->nullable();
            $table->integer('atk')->nullable();
            $table->integer('spp')->nullable();
            $table->integer('ekskul')->nullable();
            $table->integer('lks1')->nullable();
            $table->integer('lks2')->nullable();
            $table->string('ketpendaftaran')->nullable();
            $table->string('ketseragam')->nullable();
            $table->string('ketatk')->nullable();
            $table->string('ketekskul')->nullable();
            $table->string('ketlks1')->nullable();
            $table->string('ketlks2')->nullable();
            $table->date('tanggal');
            $table->string('tapel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
