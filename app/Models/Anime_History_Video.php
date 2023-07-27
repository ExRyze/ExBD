<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anime_History_Video extends Model
{
    use HasFactory;

    public $table = "anime_history_videos";

    public function mistakes() : HasMany
    {
        return $this->hasMany(Anime_History_Video_Mistake::class, 'video_anime_id', 'id');
    }

    public function subtitles() : HasMany
    {
        return $this->hasMany(Anime_History_Video_Subtitle::class, 'video_anime_id', 'id');
    }
}
