<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    use HasFactory;

    protected $table = "manager";

    protected $fillable = [
        'id',
        'name',
        'type',
        'created_at',
        'created_at',
];
}
