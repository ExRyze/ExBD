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
            $table->text('title');
            $table->text('slug');
            $table->integer('episodes')->nullable();
            $table->string('duration')->nullable();
            $table->enum('type', ['TV', 'ONA', 'OVA', 'Special', 'Movie'])->nullable();
            $table->enum('status', ['Not yet aired', 'Currently airing', 'Finished airing'])->nullable();
            $table->enum('source', ['Manga', 'Web manga', 'Light novel', 'Original'])->nullable();
            $table->date('date_aired')->nullable();
            $table->date('date_finished')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            // $table->foreignId('user_id')->constrained("users")->onUpdate("cascade");
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
