<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->increments('id_dokumen');
            $table->integer('id_jenis_dokumen')->unsigned();
            $table->string('nama_dokumen',100);
            $table->string('template_dokumen',200);
            $table->string('keterangan',250)->nullable();

            $table->foreign('id_jenis_dokumen')
            ->references('id_jenis_dokumen')->on('jenis_dokumen')
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
        Schema::dropIfExists('dokumen');
    }
}
