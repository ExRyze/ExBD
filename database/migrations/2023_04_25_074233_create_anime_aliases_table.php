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
        Schema::create('anime_aliases', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->text('alias');
            $table->timestamps();
            $table->foreignId('anime_id')->nullable()->constrained("animes")->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_aliases');
    }
};
