<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assetType extends Model
{
    use HasFactory;
    protected $table = "asset_type";

    protected $fillable = [
        'id',
        'name',
];



}
