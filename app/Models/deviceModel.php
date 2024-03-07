<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deviceModel extends Model
{
    use HasFactory;
    protected $table = 'model';

    protected $fillable = [
            'id',
            'device_image' ,
            'name' ,
            'category',
            'location',
            'created_at',
            'created_at',
    ];

}

