<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Relation_Producer extends Model
{
    use HasFactory;

    public $table = "anime_relation_producers";

    public $timestamps = false;

    protected $fillable = [
        'anime_id',
        'producer_id'
    ];

    public function anime() : BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }

    public function producer() : BelongsTo
    {
        return $this->belongsTo(Anime_Producer::class);
    }
}
