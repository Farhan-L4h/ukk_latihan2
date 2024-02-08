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
        Schema::create('detail_orderans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_masakan');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('id_status')->default(4);
            $table->integer('total_pesanan');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('id_masakan')->references('id')->on('masakans')->onDelete('restrict');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('id_status')->references('id')->on('statuses')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_orderans');
    }
};
