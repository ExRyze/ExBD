<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class History_Video_Anime extends Model
{
    use HasFactory;

    public $table = "history_video_animes";

    public function mistakes() : HasMany
    {
        return $this->hasMany(History_Video_Anime_Mistake::class, 'video_anime_id', 'id');
    }

    public function subtitles() : HasMany
    {
        return $this->hasMany(History_Video_Anime_Subtitle::class, 'video_anime_id', 'id');
    }
}
