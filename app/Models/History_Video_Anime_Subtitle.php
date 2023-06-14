<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History_Video_Anime_Subtitle extends Model
{
    use HasFactory;

    public $table = "history_video_anime_subtitles";

    public function video() : BelongsTo
    {
        return $this->belongsTo(History_Video_Anime::class);
    }
}
