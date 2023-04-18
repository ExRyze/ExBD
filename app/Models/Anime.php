<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anime extends Model
{
    use HasFactory;
    
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
        'description',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, "id_user", "id");
    }
}
