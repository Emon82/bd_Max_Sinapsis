<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $table = 'portfolios';
    protected $fillable = [
        'title_EESS',
        'title_IINN',
        'images',
        'sub_Title_EESS',
        'sub_Title_IINN',
        'sub_desc_EESS',
        'sub_desc_IINN',
        'position',
    ];

    protected $casts = [
        'images' => 'array',  // Automatically cast images to JSON
    ];
}