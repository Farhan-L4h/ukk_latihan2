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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('id_level')->nullable();
            $table->string('role')->default('user');
            $table->unsignedBigInteger('id_saldo')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_level')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('id_saldo')->references('id')->on('saldos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
