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
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('type');
            $table->integer('episodes');
            $table->string('status');
            $table->date('date_aired');
            $table->date('date_finished');
            $table->string('source');
            $table->string('duration');
            $table->string('rating');
            $table->timestamps();
            $table->foreignId('user_id')->constrained("users")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
