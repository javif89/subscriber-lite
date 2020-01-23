<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Traits\RESTActions;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    use RESTActions;

    const MODEL = Subscriber::class;

    // Override the store function so we can make sure to create the subscriber under the currently authenticated user
    public function store(Request $request)
    {
        $this->validate($request, Subscriber::$rules);

        $payload = $request->all();

        $created = Auth::user()->subscribers()->create($payload);
        // Load all the default value fields (if any)
        $created->refresh();

        return $this->respond(Response::HTTP_CREATED, $created);
    }
}
