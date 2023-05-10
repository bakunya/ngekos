<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    use HasFactory;

    protected $table = "penyewa";
    
    protected $fillable = [
        "telp",
        "nik",
        "alamat",
        "id_user"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "id_user", "id");
    }
}
