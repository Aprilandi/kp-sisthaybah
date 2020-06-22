<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->increments('id_arsip');
            $table->integer('id_dokumen')->unsigned();
            $table->string('nama_arsip',100);
            $table->string('no_dokumen',50);
            $table->string('tujuan_dokumen',100);
            $table->string('asal_dokumen',100);
            $table->date('tanggal_dokumen');
            $table->string('disposisi_dokumen',200);
            $table->string('file_dokumen',200);
            $table->tinyInteger('is_disposisi_selesai');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_dokumen')
            ->references('id_dokumen')->on('dokumen')
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
        Schema::dropIfExists('arsip');
    }
}
