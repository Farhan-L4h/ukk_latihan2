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
        Schema::create('masakans', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama_masakan');
            $table->integer('harga');
            $table->integer('stock');
            $table->unsignedBigInteger('id_status')->default(1);
            $table->string('deskripsi', 10000)->nullable();
            $table->timestamps();

            $table->foreign('id_status')->references('id')->on('statuses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masakans');
    }
};
