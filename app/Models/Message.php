<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';

    protected $fillable = [
        'full_name',
        'telephone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'email',
        'message',
        'messageType',
    ];
}
