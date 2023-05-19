<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video_Anime extends Model
{
    use HasFactory;

    public $table = "video_animes";

    protected $fillable = [
        'lenght_video',
        'resolution',
        'size',
        'video_tracks',
        'chapters',
        'episode',
        'audio_tracks',
        'origin',
        'type',
        'cover',
        'folder_anime_id',
    ];

    public function folder() : BelongsTo
    {
        return $this->belongsTo(Folder_Anime::class);
    }

    public function mistakes() : HasMany
    {
        return $this->hasMany(Video_Anime_Mistake::class, 'video_anime_id', 'id');
    }

    public function subtitles() : HasMany
    {
        return $this->hasMany(Video_Anime_Subtitle::class, 'video_anime_id', 'id');
    }
}
