<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disc extends Model
{
    protected $fillable = ['title', 'artist', 'price', 'stock'];
}
