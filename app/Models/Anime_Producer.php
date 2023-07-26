<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime_Producer extends Model
{
    use HasFactory;

    public $table = "anime_producers";

    public $timestamps = false;

    protected $fillable = [
        'producer'
    ];
}
