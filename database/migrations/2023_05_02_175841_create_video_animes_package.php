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
        // ==================== anime_history_videos table ====================
        Schema::create('anime_history_videos', function (Blueprint $table) {
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
            $table->boolean('bd')->default(0);
            $table->boolean('approved')->default(0);
            $table->timestamps();
            $table->string('slug');
        });

        DB::unprepared('CREATE TRIGGER Retrieve_Anime_Video AFTER UPDATE ON `anime_history_videos` FOR EACH ROW
        BEGIN
          INSERT INTO `anime_videos` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `bd`, `approved`, `created_at`, `updated_at`, `folder_anime_id`) VALUES (NEW.id, NEW.lenght_video, NEW.resolution, NEW.size, NEW.video_tracks, NEW.audio_tracks, NEW.chapters, NEW.episode, NEW.origin, NEW.type, NEW.bd, NEW.approved, NEW.created_at, NEW.updated_at, (SELECT `id` FROM `anime_folders` WHERE NEW.slug = `anime_folders`.`slug`));
          UPDATE `anime_history_video_mistakes` SET `retrieve` = 1 WHERE `video_anime_id` = NEW.id;
          UPDATE `anime_history_video_subtitles` SET `retrieve` = 1 WHERE `video_anime_id` = NEW.id;
        END');

        // ==================== anime_videos table ====================
        Schema::create('anime_videos', function (Blueprint $table) {
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
            $table->boolean('bd')->default(0);
            $table->boolean('approved')->default(0);
            $table->timestamps();
            $table->foreignId('folder_anime_id')->nullable()->constrained("anime_folders")->cascadeOnUpdate()->cascadeOnDelete();
        });

        DB::unprepared('CREATE TRIGGER Create_History_Anime_Video BEFORE DELETE ON `anime_videos` FOR EACH ROW
        BEGIN
          INSERT INTO `anime_history_videos` (`id`, `lenght_video`, `resolution`, `size`, `video_tracks`, `audio_tracks`, `chapters`, `episode`, `origin`, `type`, `bd`, `approved`, `created_at`, `updated_at`, `slug`) VALUES (OLD.id, OLD.lenght_video, OLD.resolution, OLD.size, OLD.video_tracks, OLD.audio_tracks, OLD.chapters, OLD.episode, OLD.origin, OLD.type, OLD.bd, OLD.approved, OLD.created_at, OLD.updated_at, (SELECT `slug` FROM `anime_folders` WHERE OLD.folder_anime_id = `anime_folders`.`id`));
          UPDATE `anime_video_mistakes` SET `remove`= 1 WHERE `video_anime_id` = OLD.id;
          UPDATE `anime_video_subtitles` SET `remove`= 1 WHERE `video_anime_id` = OLD.id;
        END');

        // ==================== anime_history_video_mistakes table ====================
        Schema::create('anime_history_video_mistakes', function (Blueprint $table) {
            $table->foreignId('video_anime_id')->nullable()->constrained("anime_history_videos")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mistake_id')->nullable()->constrained("mistakes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('retrieve')->default(0);
        });

        DB::unprepared('CREATE TRIGGER Retrieve_Anime_Video_Mistake AFTER UPDATE ON `anime_history_video_mistakes` FOR EACH ROW
        BEGIN
          INSERT INTO `anime_video_mistakes` (`video_anime_id`, `mistake_id`, `remove`) VALUES (NEW.video_anime_id, NEW.mistake_id, 0);
        END');

        // ==================== anime_video_mistakes table ====================
        Schema::create('anime_video_mistakes', function (Blueprint $table) {
            $table->foreignId('video_anime_id')->nullable()->constrained("anime_videos")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mistake_id')->nullable()->constrained("mistakes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('remove')->default(0);
        });

        DB::unprepared('CREATE TRIGGER Create_History_Anime_Video_Mistake AFTER UPDATE ON `anime_video_mistakes` FOR EACH ROW
        BEGIN
            IF OLD.remove != NEW.remove THEN
                INSERT INTO `anime_history_video_mistakes` (`video_anime_id`, `mistake_id`, `retrieve`) VALUES (NEW.video_anime_id, NEW.mistake_id, 0);
            END IF;
        END');

        // ==================== anime_history_video_subtitles table ====================
        Schema::create('anime_history_video_subtitles', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('subtitle');
            $table->foreignId('video_anime_id')->nullable()->constrained("anime_history_videos")->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('retrieve')->default(0);
        });

        DB::unprepared('CREATE TRIGGER Retrieve_Anime_Video_Subtitle AFTER UPDATE ON `anime_history_video_subtitles` FOR EACH ROW
        BEGIN
          INSERT INTO `anime_video_subtitles` (`id`, `origin`, `subtitle`, `video_anime_id`, `remove`) VALUES (NEW.id, NEW.origin, NEW.subtitle, NEW.video_anime_id, 0);
        END');

        // ==================== anime_video_subtitles table ====================
        Schema::create('anime_video_subtitles', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('subtitle');
            $table->foreignId('video_anime_id')->nullable()->constrained("anime_videos")->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('remove')->default(0);
        });

        DB::unprepared('CREATE TRIGGER Create_History_Anime_Video_Subtitle AFTER UPDATE ON `anime_video_subtitles` FOR EACH ROW
        BEGIN
            IF OLD.remove != NEW.remove THEN
                INSERT INTO `anime_history_video_subtitles` (`id`, `origin`, `subtitle`, `video_anime_id`, `retrieve`) VALUES (NEW.id, NEW.origin, NEW.subtitle, NEW.video_anime_id, 0);
            END IF;
        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // anime_history_videos table
        DB::unprepared('DROP TRIGGER `Retrieve_Anime_Video`');
        Schema::dropIfExists('anime_history_videos');

        // anime_videos table
        DB::unprepared('DROP TRIGGER `Create_History_Anime_Video`');
        Schema::dropIfExists('anime_videos');
        
        // anime_history_video_mistakes table
        DB::unprepared('DROP TRIGGER `Retrieve_Anime_Video_Mistake`');
        Schema::dropIfExists('anime_history_video_mistakes');
        
        // anime_video_mistakes table
        DB::unprepared('DROP TRIGGER `Create_History_Anime_Video_Mistake`');
        Schema::dropIfExists('anime_video_mistakes');
        
        // anime_history_video_subtitles table
        DB::unprepared('DROP TRIGGER `Retrieve_Anime_Video_Subtitle`');
        Schema::dropIfExists('anime_history_video_subtitles');
        
        // anime_video_subtitles table
        DB::unprepared('DROP TRIGGER `Create_History_Anime_Video_Subtitle`');
        Schema::dropIfExists('anime_video_subtitles');
    }
};
