<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars';

    public function kos()
    {
        return $this->belongsTo(Kos::class, 'kos_id', 'id');
    }
}
