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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembelian');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_merk');
            $table->unsignedBigInteger('id_kasir');
            $table->integer('jumlah');
            $table->integer('total');
            $table->string('cover');
            $table->timestamps();

            $table->foreign('id_merk')->references('id')->on('merks')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreign('id_kasir')->references('id')->on('kasirs')->onDelete('cascade');
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
};
