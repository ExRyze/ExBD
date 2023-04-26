<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime_Alias extends Model
{
    use HasFactory;

    public $table = "anime_aliases";
    
    protected $fillable = [
        'origin',
        'alias',
        'anime_id'
    ];

    public function anime() : BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }
}
