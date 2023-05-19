<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
    use HasFactory;

    public $table = "mistakes";

    public $timestamps = false;

    protected $fillable = [
        'mistake'
    ];
}
