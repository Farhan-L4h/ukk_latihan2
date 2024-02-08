<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_detail');
            $table->unsignedBigInteger('id_saldo')->nullable();
            $table->unsignedBigInteger('id_masakan');
            $table->unsignedBigInteger('id_status')->default('5');   
            $table->integer('total_bayar');
            $table->integer('kembali');
            $table->date('tanggal');            
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('id_detail')->references('id')->on('detail_orderans')->onDelete('restrict');
            $table->foreign('id_status')->references('id')->on('statuses')->onDelete('restrict');
            $table->foreign('id_saldo')->references('id')->on('saldos')->onDelete('restrict');
            $table->foreign('id_masakan')->references('id')->on('masakans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
