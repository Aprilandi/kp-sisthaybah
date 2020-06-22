<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIuran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iuran', function (Blueprint $table) {
            $table->increments('id_iuran');
            $table->integer('id_biaya')->unsigned();
            $table->integer('id_santri')->unsigned();
            $table->integer('tahun_iuran');
            $table->integer('tahun_bulan');
            $table->boolean('is_telat');
            $table->boolean('is_lunas');
            $table->float('jumlah_bayar', 19, 2);
            $table->float('jumlah_hutang', 19, 2);

            //foreign key
            $table->foreign('id_biaya')
            ->references('id_biaya')->on('biaya')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('id_santri')
            ->references('id_santri')->on('santris')
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
        Schema::dropIfExists('iuran');
    }
}
