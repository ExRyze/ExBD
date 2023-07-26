<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime_Mistake extends Model
{
    use HasFactory;

    public $table = "anime_mistakes";

    public $timestamps = false;

    protected $fillable = [
        'mistake'
    ];
}
