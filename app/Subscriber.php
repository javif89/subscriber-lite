<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    public static $rules = [
        'email' => 'required|email'
    ];
}
