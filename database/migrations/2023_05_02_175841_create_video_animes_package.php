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
        // ==================== history_video_animes table ====================
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

        // ==================== video_animes table ====================
        Schema::create('video_animes', function (Blueprint $table) {
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
            $table->foreignId('folder_anime_id')->nullable()->constrained("folder_animes")->cascadeOnUpdate()->cascadeOnDelete();
        });

        DB::unprepared('CREATE TRIGGER Create_History_Anime_Video BEFORE DELETE ON `video_animes` FOR EACH ROW
        BEGIN
          INSERT INTO `history_video_animes` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `cover`, `approved`, `created_at`, `updated_at`, `slug`) VALUES (OLD.id, OLD.lenght_video, OLD.resolution, OLD.size, OLD.video_tracks, OLD.audio_tracks, OLD.chapters, OLD.episode, OLD.origin, OLD.type, OLD.cover, OLD.approved, OLD.created_at, OLD.updated_at, (SELECT `slug` FROM `folder_animes` WHERE OLD.folder_anime_id = `folder_animes`.`id`));
          UPDATE `video_anime_mistakes` SET `remove`= 1 WHERE `video_anime_id` = OLD.id;
          UPDATE `video_anime_subtitles` SET `remove`= 1 WHERE `video_anime_id` = OLD.id;
        END');

        // ==================== history_video_anime_mistakes table ====================
        Schema::create('history_video_anime_mistakes', function (Blueprint $table) {
            $table->foreignId('video_anime_id')->nullable()->constrained("history_video_animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mistake_id')->nullable()->constrained("mistakes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('retrive')->default(0);
        });

        DB::unprepared('CREATE TRIGGER Retrive_Anime_Video_Mistake AFTER UPDATE ON `history_video_anime_mistakes` FOR EACH ROW
        BEGIN
          INSERT INTO `video_anime_mistakes` (`video_anime_id`, `mistake_id`, `remove`) VALUES (NEW.video_anime_id, NEW.mistake_id, 0);
        END');

        // ==================== video_anime_mistakes table ====================
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

        // ==================== history_video_anime_subtitles table ====================
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

        // ==================== video_anime_subtitles table ====================
        Schema::create('video_anime_subtitles', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('subtitle');
            $table->foreignId('video_anime_id')->nullable()->constrained("video_animes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('remove')->default(0);
        });

        DB::unprepared('CREATE TRIGGER Create_History_Anime_Video_Subtitle AFTER UPDATE ON `video_anime_subtitles` FOR EACH ROW
        BEGIN
            IF OLD.remove != NEW.remove THEN
                INSERT INTO `history_video_anime_subtitles` (`id`, `origin`, `subtitle`, `video_anime_id`, `retrive`) VALUES (NEW.id, NEW.origin, NEW.subtitle, NEW.video_anime_id, 0);
            END IF;
        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // history_video_animes table
        DB::unprepared('DROP TRIGGER `Retrive_Anime_Video`');
        Schema::dropIfExists('history_video_animes');

        // video_animes table
        DB::unprepared('DROP TRIGGER `Create_History_Anime_Video`');
        Schema::dropIfExists('video_animes');
        
        // history_video_anime_mistakes table
        DB::unprepared('DROP TRIGGER `Retrive_Anime_Video_Mistake`');
        Schema::dropIfExists('history_video_anime_mistakes');
        
        // video_anime_mistakes table
        DB::unprepared('DROP TRIGGER `Create_History_Anime_Video_Mistake`');
        Schema::dropIfExists('video_anime_mistakes');
        
        // history_video_anime_subtitles table
        DB::unprepared('DROP TRIGGER `Retrive_Anime_Video_Subtitle`');
        Schema::dropIfExists('history_video_anime_subtitles');
        
        // video_anime_subtitles table
        DB::unprepared('DROP TRIGGER `Create_History_Anime_Video_Subtitle`');
        Schema::dropIfExists('video_anime_subtitles');
    }
};
