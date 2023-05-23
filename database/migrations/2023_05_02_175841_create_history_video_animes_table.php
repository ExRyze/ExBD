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
        Schema::create('history_video_animes', function (Blueprint $table) {
            $table->id();
            $table->string('lenght_video', 10);
            $table->string('resolution', 11);
            $table->double('size', 12, 1);
            $table->string('video_tracks')->nullable();
            $table->string('audio_tracks')->nullable();
            $table->string('chapters');
            $table->double('episode', 12, 1);
            $table->string('origin');
            $table->enum('type', ['mkv', 'mp4']);
            $table->boolean('cover')->default(0);
            $table->boolean('approved')->default(0);
            $table->timestamps();
            $table->string('slug');
        });

        DB::unprepared('CREATE TRIGGER Retrive_Anime_Video AFTER UPDATE ON `history_video_animes` FOR EACH ROW
        BEGIN
          INSERT INTO `video_animes` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `cover`, `approved`, `created_at`, `updated_at`, `folder_anime_id`) VALUES (NEW.id, NEW.lenght_video, NEW.resolution, NEW.size, NEW.video_tracks, NEW.audio_tracks, NEW.chapters, NEW.episode, NEW.origin, NEW.type, NEW.cover, NEW.approved, NEW.created_at, NEW.updated_at, (SELECT `id` FROM `folder_animes` WHERE NEW.slug = `folder_animes`.`slug`));
          UPDATE `history_video_anime_mistakes` SET `retrive` = 1 WHERE `video_anime_id` = NEW.id;
          UPDATE `history_video_anime_subtitles` SET `retrive` = 1 WHERE `video_anime_id` = NEW.id;
        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `Retrive_Anime_Video`');
        Schema::dropIfExists('history_video_animes');
    }
};
