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
        // ==================== anime_relation_genres table ====================
        Schema::create('anime_genres', function (Blueprint $table) {
            $table->foreignId('anime_id')->nullable()->constrained("animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('genre_id')->nullable()->constrained("genres")->cascadeOnUpdate()->cascadeOnDelete();
        });
        
        // ==================== anime_relation_themes table ====================
        Schema::create('anime_themes', function (Blueprint $table) {
            $table->foreignId('anime_id')->nullable()->constrained("animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('theme_id')->nullable()->constrained("themes")->cascadeOnUpdate()->cascadeOnDelete();
        });
        
        // ==================== anime_relation_producers table ====================
        Schema::create('anime_producers', function (Blueprint $table) {
            $table->foreignId('anime_id')->nullable()->constrained("animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('producer_id')->nullable()->constrained("producers")->cascadeOnUpdate()->cascadeOnDelete();
        });
        
        // ==================== anime_relation_licensors table ====================
        Schema::create('anime_licensors', function (Blueprint $table) {
            $table->foreignId('anime_id')->nullable()->constrained("animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('licensor_id')->nullable()->constrained("licensors")->cascadeOnUpdate()->cascadeOnDelete();
        });
        
        // ==================== anime_relation_studios table ====================
        Schema::create('anime_studios', function (Blueprint $table) {
            $table->foreignId('anime_id')->nullable()->constrained("animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('studio_id')->nullable()->constrained("studios")->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // anime_relation_genres table
        Schema::dropIfExists('anime_genres');
        
        // anime_relation_themes table
        Schema::dropIfExists('anime_themes');
        
        // anime_relation_producers table
        Schema::dropIfExists('anime_producers');
        
        // anime_relation_licensors table
        Schema::dropIfExists('anime_licensors');
        
        // anime_relation_studio table
        Schema::dropIfExists('anime_studios');
    }
};
