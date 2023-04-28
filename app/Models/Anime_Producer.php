<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Producer extends Model
{
    use HasFactory;

    public $table = "anime_producers";

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
        return $this->belongsTo(Producer::class);
    }
}
