<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anime extends Model
{
    use HasFactory;

    public $table = "animes";

    protected $fillable = [
        'title',
        'slug',
        'episodes',
        'duration',
        'type',
        'status',
        'source',
        'date_aired',
        'date_finished',
        'synopsis',
        'user_id'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function aliases() : HasMany
    {
        return $this->hasMany(Anime_Alias::class);
    }
}
