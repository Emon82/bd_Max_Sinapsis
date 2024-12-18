<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'services';

    // Define the fillable fields
    protected $fillable = [
        'title_eess',
        'title_iinn',
        'description_eess',
        'description_iinn',
        'position',

    ];
}
