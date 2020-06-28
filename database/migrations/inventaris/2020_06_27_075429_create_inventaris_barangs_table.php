<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->String('nama_barang', 100);
            $table->string('foto_barang',200);
            $table->integer('id_jenis_barang')->unsigned();
            $table->integer('id_lokasi')->unsigned();
            $table->integer('id_sumber_barang')->unsigned();
            $table->String('kondisi', 25);
            $table->integer('jumlah_barang');
            $table->String('keterangan', 250)->nullable();
            $table->timestamps();

            $table->foreign('id_jenis_barang')
            ->references('id_jenis_barang')->on('jenis_barang')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_lokasi')
            ->references('id_lokasi')->on('lokasi')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_sumber_barang')
            ->references('id_sumber_barang')->on('sumber_barang')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris_barang');
    }
}
