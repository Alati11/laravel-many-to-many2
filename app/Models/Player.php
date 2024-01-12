<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'ranking',
    //     'name',
    //     'image_path',   
    //     'age',
    //     'weight',
    //     'height',
    //     'points',
    //     'country',
    //     '_token',
    // ];
    protected $guarded = [];
}

