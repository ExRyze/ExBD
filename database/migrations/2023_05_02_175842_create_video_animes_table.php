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
        Schema::create('video_animes', function (Blueprint $table) {
            $table->id();
            $table->string('lenght_video', 10);
            $table->string('resolution', 11);
            $table->integer('size');
            $table->string('video_tracks')->nullable();
            $table->string('audio_tracks')->nullable();
            $table->string('chapters');
            $table->integer('episode')->nullable();
            $table->string('origin');
            $table->enum('type', ['mkv', 'mp4']);
            $table->boolean('cover')->default(0);
            $table->boolean('approved')->default(0);
            $table->timestamps();
            $table->foreignId('folder_anime_id')->nullable()->constrained("folder_animes")->cascadeOnUpdate()->cascadeOnDelete();
        });

        DB::unprepared('CREATE TRIGGER Create_History_Anime_Video BEFORE DELETE ON `video_animes` FOR EACH ROW
        BEGIN
          INSERT INTO `history_video_animes` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `cover`, `approved`, `created_at`, `updated_at`, `slug`) VALUES (OLD.id, OLD.lenght_video, OLD.resolution, OLD.size, OLD.video_tracks, OLD.audio_tracks, OLD.chapters, OLD.episode, OLD.origin, OLD.type, OLD.cover, OLD.approved, OLD.created_at, OLD.updated_at, (SELECT `slug` FROM `folder_animes` WHERE OLD.folder_anime_id = `folder_animes`.`id`));
          UPDATE `video_anime_mistakes` SET `remove`= 1 WHERE `video_anime_id` = OLD.id;
          UPDATE `video_anime_subtitles` SET `remove`= 1 WHERE `video_anime_id` = OLD.id;
        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `Create_History_Anime_Video`');
        Schema::dropIfExists('video_animes');
    }
};
