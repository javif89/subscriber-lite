<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $guarded = ['id', 'user_id'];
    protected $with = ['fields'];
    public static $rules = [
        'email' => 'required|email',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fields(){
        return $this->hasMany(SubscriberField::class);
    }
}
