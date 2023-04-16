<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lelangs', function (Blueprint $table) {
            $table->increments('id_lelang');
            $table->integer('id_barang');
            $table->date('tgl_lelang');
            $table->integer('harga_akhir')->length(20)->nullable();
            $table->integer('id_user')->nullable();
            $table->integer('id_petugas');
            $table->enum('status', ['dibuka','ditutup','selesai']);
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
        Schema::dropIfExists('lelangs');
    }
};
