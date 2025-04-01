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
        Schema::table('rooms', function (Blueprint $table) {
            $table->integer('initial_quantity')
                  ->default(0)
                  ->after('quantity')
                  ->comment('Jumlah awal kamar sebelum ada penyewaan');
        });

        // Set nilai awal untuk data yang sudah ada
        DB::statement('UPDATE rooms SET initial_quantity = quantity');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('initial_quantity');
        });
    }
};