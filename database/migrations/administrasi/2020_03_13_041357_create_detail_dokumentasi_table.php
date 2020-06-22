<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDokumentasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_dokumentasi', function (Blueprint $table) {
            $table->increments('id_detail_dokumentasi');
            $table->integer('id_dokumentasi_kegiatan')->unsigned();
            $table->string('foto_kegiatan',200);

            $table->foreign('id_dokumentasi_kegiatan')
            ->references('id_dokumentasi_kegiatan')->on('dokumentasi_kegiatan')
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
        Schema::dropIfExists('detail_dokumentasi');
    }
}
