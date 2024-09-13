<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reel extends Model
{
    use HasFactory;
    public $table = "reel";
    protected $fillable = [
        'id',
        'title',
        'userid',
        'video_url',
        'description'
        ];
}
