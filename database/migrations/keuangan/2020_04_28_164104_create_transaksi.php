<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->integer('id_kk')->unsigned();
            $table->date('tanggal');
            $table->float('jumlah', 19, 2);
            $table->text('keterangan');
            $table->string('gambar', 100);
            $table->timestamps();

            //foreign key
            $table->foreign('id_kk')
            ->references('id_kk')->on('kategori_keuangan')
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
        Schema::dropIfExists('transaksi');
    }
}
