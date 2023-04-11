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
        Schema::table('user_taxis', function (Blueprint $table) {
            $table->foreignId('color_id')
                ->nullable()
                ->constrained('colors')
                ->onDelete('cascade');
            $table->boolean('is_painted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_taxis', function (Blueprint $table) {
            $table->dropColumn('color_id');
            $table->dropColumn('is_painted');
        });
    }
};
