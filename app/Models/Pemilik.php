<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;


    protected $table = 'pemiliks';
    protected $fillable = ['nama', 'email', 'alamat', 'password'];
}
