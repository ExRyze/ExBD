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
        Schema::create('anime_genres', function (Blueprint $table) {
            $table->id();
            $table->string('genre');
        });
        
        // ==================== anime_themes table ====================
        Schema::create('anime_themes', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
        });
        
        // ==================== anime_producers table ====================
        Schema::create('anime_producers', function (Blueprint $table) {
            $table->id();
            $table->string('producer');
        });
        
        // ==================== anime_licensors table ====================
        Schema::create('anime_licensors', function (Blueprint $table) {
            $table->id();
            $table->string('licensor');
        });
        
        // ==================== anime_studios table ====================
        Schema::create('anime_studios', function (Blueprint $table) {
            $table->id();
            $table->string('studio');
        });
        
        // ==================== anime_mistake table ====================
        Schema::create('anime_mistakes', function (Blueprint $table) {
            $table->id();
            $table->string('mistake');
        });
        
        // ==================== anime_folders table ====================
        Schema::create('anime_folders', function (Blueprint $table) {
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
        Schema::dropIfExists('anime_genres');
        
        // anime_themes table
        Schema::dropIfExists('anime_themes');
        
        // anime_producers table
        Schema::dropIfExists('anime_producers');
        
        // anime_licensors table
        Schema::dropIfExists('anime_licensors');
        
        // anime_studios table
        Schema::dropIfExists('anime_studios');
        
        // anime_mistakes table
        Schema::dropIfExists('anime_mistakes');
        
        // folder_anime table
        Schema::dropIfExists('anime_folders');
    }
};
