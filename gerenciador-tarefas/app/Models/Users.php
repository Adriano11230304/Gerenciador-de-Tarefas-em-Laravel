<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model{

    protected $fillable = [
        'nome',
        'email',
        'password',
        'created_at'
    ];
    protected $table = 'users';
    public $timestamps = false;
}
