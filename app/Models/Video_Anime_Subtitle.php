<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video_Anime_Subtitle extends Model
{
    use HasFactory;

    public $table = "video_anime_subtitles";

    public $timestamps = false;

    protected $fillable = [
        'origin',
        'subtitle',
        'video_anime_id'
    ];

    public function video() : BelongsTo
    {
        return $this->belongsTo(Video_Anime::class);
    }
}
