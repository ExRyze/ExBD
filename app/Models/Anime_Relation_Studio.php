<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Relation_Studio extends Model
{
    use HasFactory;

    public $table = "anime_relation_studios";

    public $timestamps = false;

    protected $fillable = [
        'anime_id',
        'studio_id'
    ];

    public function anime() : BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }

    public function studio() : BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }
}
