<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Video_Mistake extends Model
{
    use HasFactory;

    public $table = "anime_video_mistakes";

    public $timestamps = false;

    protected $fillable = [
        'video_anime_id',
        'mistake_id'
    ];

    public function video() : BelongsTo
    {
        return $this->belongsTo(Anime_Video::class);
    }

    public function mistake() : BelongsTo
    {
        return $this->belongsTo(Anime_Mistake::class);
    }
}
