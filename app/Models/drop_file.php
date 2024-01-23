<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class drop_file extends Model
{
    protected $fillable = [
        'file_title',
        'file_content',
        'file_password',
    ];
}
