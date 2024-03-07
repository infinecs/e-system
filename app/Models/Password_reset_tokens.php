<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password_reset_tokens extends Model
{
    use HasFactory;
    protected $table = 'password_reset_tokens';

    protected $fillable = [
            'email',
            'token' ,
            'created_at' ,
    ];
}
