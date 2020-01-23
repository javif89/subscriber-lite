<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberFieldController extends Controller
{
    use RESTActions;
    
    const MODEL = Subscriber::class;
}
