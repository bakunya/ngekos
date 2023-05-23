<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "post";

    protected $fillable = ['konten'];

    public function image_urls()
    {
        return $this->hasMany(ImageUrl::class, "id_post", "id");
    }
}
