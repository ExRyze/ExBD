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
        Schema::create('video_animes', function (Blueprint $table) {
            $table->id();
            $table->time('lenght_video');
            $table->string('resolution');
            $table->string('video_tracks');
            $table->boolean('chapters');
            $table->string('audio');
            $table->string('subtitle');
            $table->integer('size');
            $table->string('origin');
            $table->timestamps();
            $table->foreignId('folder_anime_id')->nullable()->constrained("folder_animes")->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_animes');
    }
};
