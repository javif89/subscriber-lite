<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Traits\RESTActions;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    use RESTActions;

    const MODEL = Subscriber::class;
}
