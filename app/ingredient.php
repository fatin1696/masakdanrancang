<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    protected $table = 'ingredients';
    protected $fillable = ['ingredientname', 'image'];
}
