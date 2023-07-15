<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Anime_Relation extends Model
{
    use HasFactory;

    public $table = "anime_relations";

    public $timestamps = false;

    protected $fillable = [
        'anime_id',
        'relation',
        'relation_id',
    ];

    public function anime() : BelongsTo
    {
        return $this->belongsTo(Anime::class, 'anime_id', 'id');
    }

    public function connection() : BelongsTo
    {
        return $this->belongsTo(Anime::class, 'relation_id', 'id');
    }
}
