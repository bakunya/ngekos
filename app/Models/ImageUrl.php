<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUrl extends Model
{
    use HasFactory;
    protected $table = "image_urls";
    protected $fillable = ['url', 'id_post'];
}

