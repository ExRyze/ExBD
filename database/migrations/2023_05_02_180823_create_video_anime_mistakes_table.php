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
        Schema::create('video_anime_mistakes', function (Blueprint $table) {
            $table->foreignId('video_anime_id')->nullable()->constrained("video_animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mistake_id')->nullable()->constrained("mistakes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('remove')->default(0);
        });

        DB::unprepared('CREATE TRIGGER Create_History_Anime_Video_Mistake AFTER UPDATE ON `video_anime_mistakes` FOR EACH ROW
        BEGIN
            IF OLD.remove != NEW.remove THEN
                INSERT INTO `history_video_anime_mistakes` (`video_anime_id`, `mistake_id`, `retrive`) VALUES (NEW.video_anime_id, NEW.mistake_id, 0);
            END IF;
        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `Create_History_Anime_Video_Mistake`');
        Schema::dropIfExists('video_anime_mistakes');
    }
};
