<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Theme extends Model
{
    use HasFactory;

    public $table = "anime_themes";

    public $timestamps = false;

    protected $fillable = [
        'anime_id',
        'theme_id'
    ];

    public function anime() : BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }

    public function theme() : BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }
}
