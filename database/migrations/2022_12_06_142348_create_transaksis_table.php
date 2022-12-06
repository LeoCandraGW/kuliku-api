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
            $table->string('nama pembeli');
            $table->foreignId('id pembeli');
            $table->string('nama kuli');
            $table->foreignId('id kuli');
            $table->enum('status', ['pending', 'Berhasil', 'Gagal'])->default('pending');
            $table->string('metode pembayaran');
            $table->date('waktu pembayaran');
            $table->integer('nomor referensi');
            $table->double('total tagihan');
            $table->double('biaya admin');
            $table->double('total bayar');
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
};
