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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type'); // 'Include Listrik' atau 'Listrik Sendiri'
            $table->integer('price_monthly');
            $table->integer('price_yearly')->nullable();
            $table->integer('size')->nullable(); // Ukuran kamar dalam m²
            $table->integer('capacity')->default(1); // Kapasitas penghuni
            $table->text('description');
            $table->boolean('is_available')->default(true);
            $table->integer('order')->default(0); // Untuk sorting
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
