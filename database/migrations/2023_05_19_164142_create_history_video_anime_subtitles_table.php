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
        Schema::create('history_video_anime_subtitles', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('subtitle');
            $table->foreignId('video_anime_id')->nullable()->constrained("history_video_animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('retrive')->default(0);
        });

        DB::unprepared('CREATE TRIGGER Retrive_Anime_Video_Subtitle AFTER UPDATE ON `history_video_anime_subtitles` FOR EACH ROW
        BEGIN
          INSERT INTO `video_anime_subtitles` (`id`, `origin`, `subtitle`, `video_anime_id`, `remove`) VALUES (NEW.id, NEW.origin, NEW.subtitle, NEW.video_anime_id, 0);
        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `Retrive_Anime_Video_Subtitle`');
        Schema::dropIfExists('history_video_anime_subtitles');
    }
};
