<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image_path', 'caption', 'category', 'is_featured', 'order'];
}
