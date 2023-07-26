<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video_Anime_Mistake extends Model
{
    use HasFactory;

    public $table = "video_anime_mistakes";

    public $timestamps = false;

    protected $fillable = [
        'video_anime_id',
        'mistake_id'
    ];

    public function video() : BelongsTo
    {
        return $this->belongsTo(Video_Anime::class);
    }

    public function mistake() : BelongsTo
    {
        return $this->belongsTo(Anime_Mistake::class);
    }
}
