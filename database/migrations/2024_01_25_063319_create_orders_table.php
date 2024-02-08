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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('no_meja');
            $table->integer('jumlah');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_masakan');
            $table->string('keterangan')->nullable();
            $table->string('status')->default('menunggu');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('id_masakan')->references('id')->on('masakans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
