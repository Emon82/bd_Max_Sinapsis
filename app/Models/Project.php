<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        // 'serial_number',
        'title_EESS',
        'title_IINN',
        'location_EESS',
        'location_IINN',
        'description_EESS',
        'description_IINN',
    ];
}
