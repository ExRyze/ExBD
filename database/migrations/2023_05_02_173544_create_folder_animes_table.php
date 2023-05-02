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
        Schema::create('folder_animes', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->boolean('approved');
            $table->timestamps();
            $table->foreignId('anime_id')->nullable()->constrained("animes")->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folder_animes');
    }
};