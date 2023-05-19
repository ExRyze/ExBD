<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('history_video_anime_mistakes', function (Blueprint $table) {
            $table->foreignId('video_anime_id')->nullable()->constrained("history_video_animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mistake_id')->nullable()->constrained("mistakes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('retrive')->default(0);
        });

        DB::unprepared('CREATE TRIGGER Retrive_Anime_Video_Mistake AFTER UPDATE ON `history_video_anime_mistakes` FOR EACH ROW
        BEGIN
          INSERT INTO `video_anime_mistakes` (`video_anime_id`, `mistake_id`, `remove`) VALUES (NEW.video_anime_id, NEW.mistake_id, 0);
        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `Retrive_Anime_Video_Mistake`');
        Schema::dropIfExists('history_video_anime_mistakes');
    }
};
