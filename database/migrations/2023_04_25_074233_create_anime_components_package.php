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
        // ==================== anime_aliases table ====================
        Schema::create('anime_aliases', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->text('alias');
            $table->foreignId('anime_id')->nullable()->constrained("animes")->cascadeOnUpdate()->cascadeOnDelete();
        });
        
        // ==================== anime_genres table ====================
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('genre');
        });
        
        // ==================== anime_themes table ====================
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
        });
        
        // ==================== anime_producers table ====================
        Schema::create('producers', function (Blueprint $table) {
            $table->id();
            $table->string('producer');
        });
        
        // ==================== anime_licensors table ====================
        Schema::create('licensors', function (Blueprint $table) {
            $table->id();
            $table->string('licensor');
        });
        
        // ==================== anime_studios table ====================
        Schema::create('studios', function (Blueprint $table) {
            $table->id();
            $table->string('studio');
        });
        
        // ==================== anime_mistake table ====================
        Schema::create('mistakes', function (Blueprint $table) {
            $table->id();
            $table->string('mistake');
        });
        
        // ==================== folder_animes table ====================
        Schema::create('folder_animes', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->boolean('approved');
            $table->timestamps();
            $table->foreignId('anime_id')->nullable()->constrained("animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained("users")->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // anime_aliases table
        Schema::dropIfExists('anime_aliases');
        
        // anime_genres table
        Schema::dropIfExists('genres');
        
        // anime_themes table
        Schema::dropIfExists('themes');
        
        // anime_producers table
        Schema::dropIfExists('producers');
        
        // anime_licensors table
        Schema::dropIfExists('licensors');
        
        // anime_studios table
        Schema::dropIfExists('studios');
        
        // anime_mistakes table
        Schema::dropIfExists('mistakes');
        
        // folder_anime table
        Schema::dropIfExists('folder_animes');
    }
};
