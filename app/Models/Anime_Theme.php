<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime_Theme extends Model
{
    use HasFactory;

    public $table = "anime_themes";

    public $timestamps = false;

    protected $fillable = [
        'theme'
    ];
}
