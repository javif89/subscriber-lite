<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Traits\RESTActions;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    use RESTActions {
        RESTActions::update as restUpdate;
        RESTActions::destroy as restDestroy;
    }

    const MODEL = Subscriber::class;
    
    public function __construct(){
        $this->authorizeResource(self::MODEL, 'subscriber');
    }

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

    // Declare the update and delete functions using the class name so the policy can work properly
    public function update(Request $request, Subscriber $subscriber)
    {
        $this->restUpdate($request, $subscriber->id);
    }

    public function destroy(Subscriber $subscriber)
    {
        $this->restDestroy($subscriber->id);
    }
}
