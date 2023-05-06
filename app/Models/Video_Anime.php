<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video_Anime extends Model
{
    use HasFactory;

    public $table = "video_animes";

    protected $fillable = [
        'lenght_video',
        'resolution',
        'video_tracks',
        'chapters',
        'audio',
        'subtitle',
        'size',
        'origin',
    ];

    public function folder() : BelongsTo
    {
        return $this->belongsTo(Folder_Anime::class);
    }

    // Has Mistakes
}
