<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Relation_Theme extends Model
{
    use HasFactory;

    public $table = "anime_relation_themes";

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
        return $this->belongsTo(Anime_Theme::class);
    }
}
