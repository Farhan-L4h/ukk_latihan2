<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });

        DB::table('statuses')->insert([
            ['status' => 'ready'],
            ['status' => 'habis'],
            ['status' => 'menunggu'],
            ['status' => 'Tidak Lunas'],
            ['status' => 'Lunas'],
        ]);
    }
    
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
