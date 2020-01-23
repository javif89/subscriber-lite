<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\SubscriberField;
use App\Traits\RESTActions;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriberFieldController extends Controller
{
    use RESTActions;

    const MODEL = Subscriber::class;

    public function store(Request $request)
    {
        $this->validate($request, SubscriberField::$rules);

        $payload = $request->except('subscriber_id');
        $subscriber = Subscriber::find($request->input('subscriber_id'));

        $created = $subscriber->fields()->create($payload);
        // Load all the default value fields (if any)
        $created->refresh();

        return $this->respond(Response::HTTP_CREATED, $created);
    }
}
