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
        Schema::create('video_anime_mistakes', function (Blueprint $table) {
            $table->foreignId('video_anime_id')->nullable()->constrained("video_animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mistake_id')->nullable()->constrained("mistakes")->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_anime_mistakes');
    }
};
