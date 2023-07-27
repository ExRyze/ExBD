<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anime_Video extends Model
{
    use HasFactory;

    public $table = "anime_videos";

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
        'bd',
        'folder_anime_id',
    ];

    public function folder() : BelongsTo
    {
        return $this->belongsTo(Anime_Folder::class);
    }

    public function mistakes() : HasMany
    {
        return $this->hasMany(Anime_Video_Mistake::class, 'video_anime_id', 'id');
    }

    public function subtitles() : HasMany
    {
        return $this->hasMany(Anime_Video_Subtitle::class, 'video_anime_id', 'id');
    }
}
