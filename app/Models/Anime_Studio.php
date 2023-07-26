<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime_Studio extends Model
{
    use HasFactory;

    public $table = "anime_studios";

    public $timestamps = false;

    protected $fillable = [
        'studio'
    ];
}
