<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    // Components
    public function aliases() : HasMany
    {
        return $this->hasMany(Anime_Alias::class);
    }

    public function genres() : HasMany
    {
        return $this->hasMany(Anime_Relation_Genre::class);
    }

    public function themes() : HasMany
    {
        return $this->hasMany(Anime_Relation_Theme::class);
    }

    public function producers() : HasMany
    {
        return $this->hasMany(Anime_Relation_Producer::class);
    }

    public function licensors() : HasMany
    {
        return $this->hasMany(Anime_Relation_Licensor::class);
    }

    public function studios() : HasMany
    {
        return $this->hasMany(Anime_Relation_Studio::class);
    }

    // Relations
    public function sequel() : HasMany
    {
        return $this->hasMany(Anime_Relation::class, 'anime_id', 'id')->where('relation', 'Sequel');
    }

    public function prequel() : HasMany
    {
        return $this->hasMany(Anime_Relation::class, 'relation_id', 'id')->where('relation', 'Sequel');
    }

    // Files
    public function folder() : HasOne
    {
        return $this->hasOne(Anime_Folder::class);
    }
}
