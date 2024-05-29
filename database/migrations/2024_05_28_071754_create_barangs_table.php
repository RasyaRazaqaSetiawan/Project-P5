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
        Schema::create('barangs', function (Blueprint $table) {

            $table->id();
            $table->string('nama_barang');
            $table->integer('stok');
            $table->integer('harga');
            $table->unsignedBigInteger('id_merk');
            $table->string('cover');
            $table->timestamps();


            $table->foreign('id_merk')->references('id')->on('merks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};
