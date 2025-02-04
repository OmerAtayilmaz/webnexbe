<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //fillable
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'message',
        'company',
        'service',
    ];
}
