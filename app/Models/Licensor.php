<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licensor extends Model
{
    use HasFactory;

    public $table = "licensors";

    public $timestamps = false;

    protected $fillable = [
        'licensor'
    ];
}