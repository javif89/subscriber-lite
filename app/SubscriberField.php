<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriberField extends Model
{
    protected $guarded = ['id', 'subscriber_id'];
    public static $rules = [
        'title' => 'required'
    ];

    public function subscriber(){
        return $this->belongsTo(Subscriber::class);
    }
}
