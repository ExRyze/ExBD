<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Licensor extends Model
{
    use HasFactory;

    public $table = "anime_licensors";

    public $timestamps = false;

    protected $fillable = [
        'anime_id',
        'licensor_id'
    ];

    public function anime() : BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }

    public function licensor() : BelongsTo
    {
        return $this->belongsTo(Licensor::class);
    }
}
