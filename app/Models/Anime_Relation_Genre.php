<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Relation_Genre extends Model
{
    use HasFactory;

    public $table = "anime_relation_genres";

    public $timestamps = false;

    protected $fillable = [
        'anime_id',
        'genre_id'
    ];

    public function anime() : BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }

    public function genre() : BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
