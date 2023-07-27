<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anime_Folder extends Model
{
    use HasFactory;

    public $table = "anime_folders";

    protected $fillable = [
        'slug',
        'approved',
        'anime_id',
        'user_id',
    ];

    public function anime() : BelongsTo
    {
        return $this->belongsTo(Anime::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function videos() : HasMany
    {
        return $this->hasMany(Anime_Video::class, 'folder_anime_id', 'id')->orderBy('episode');
    }
}
