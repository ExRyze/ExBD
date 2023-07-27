<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Video_Subtitle extends Model
{
    use HasFactory;

    public $table = "anime_video_subtitles";

    public $timestamps = false;

    protected $fillable = [
        'origin',
        'subtitle',
        'video_anime_id'
    ];

    public function video() : BelongsTo
    {
        return $this->belongsTo(Anime_Video::class);
    }
}
