<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_History_Video_Mistake extends Model
{
    use HasFactory;

    public $table = "anime_history_video_mistakes";

    public function video() : BelongsTo
    {
        return $this->belongsTo(Anime_History_Video::class);
    }

    public function mistake() : BelongsTo
    {
        return $this->belongsTo(Anime_Mistake::class);
    }
}
