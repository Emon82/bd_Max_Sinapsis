<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creative extends Model
{
    use HasFactory;


    protected $fillable = [

        'title_EESS',
        'title_IINN',
        'sub_title_EESS',
        'sub_title_IINN',
        'image',
        'content_EESS',
        'content_IINN',
        'image_position',
    ];
}
