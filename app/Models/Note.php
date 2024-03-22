<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = "job_notes";

    protected $fillable = ['job_reference', 'note', 'created_at', 'updated_at'];
}
