<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime_Licensor extends Model
{
    use HasFactory;

    public $table = "anime_licensors";

    public $timestamps = false;

    protected $fillable = [
        'licensor'
    ];
}
