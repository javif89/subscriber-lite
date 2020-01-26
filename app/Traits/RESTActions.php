<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

trait RESTActions
{
    public function index()
    {
        $m = self::MODEL;
        return $this->respond(Response::HTTP_OK, $m::all());
    }

    public function show($id)
    {
        $m = self::MODEL;
        $model = $m::find($id);
        if (is_null($model)) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function store(Request $request)
    {
        $m = self::MODEL;

        $validator = Validator::make($request->all(), Subscriber::$rules);

        if ($validator->fails()) {
            return $this->respond(Response::HTTP_UNPROCESSABLE_ENTITY, $validator->getMessageBag());
        }

        $payload = $request->all();

        $created = $m::create($payload);
        // Load all the default value fields (if any)
        $created->refresh();

        return $this->respond(Response::HTTP_CREATED, $created);
    }

    public function update(Request $request, $id)
    {
        $m = self::MODEL;

        $model = $m::find($id);
        if (is_null($model)) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }

        $payload = $request->all();

        $model->update($payload);
        
        return $this->respond(Response::HTTP_OK, $model);
    }

    public function destroy($id)
    {
        $m = self::MODEL;
        if (is_null($m::find($id))) {
            return $this->respond(Response::HTTP_NOT_FOUND);
        }
        $m::destroy($id);
        return $this->respond(Response::HTTP_NO_CONTENT);
    }

    protected function respond($status, $data = [])
    {
        if (request()->ajax()) {
            return response()->json($data, $status);
        }

        return back();
    }
}
