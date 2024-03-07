<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assetList extends Model
{
    use HasFactory;

    protected $table = "asset_list";

    protected $fillable = [
        'id',
        'device_image' ,
        'asset_tag' ,
        'serial',
        'brand',
        'model' ,
        'category',
        'status',
        'checked_out_to',
        'location',
        'current_value',
        'upload_signed_document',
];

}
