<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Services\ActionService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Collection
     */
    public function index(Request $request): Collection
    {
        return ActionService::index($request->user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Action
     * @throws \Exception
     */
    public function store(Request $request): Action
    {
        $validatedData = $request->validate([
            'publisher'         => 'required|string',
            'publisher_data'    => 'required|array',
            'subscriber'        => 'required|string',
            'subscriber_data'   => 'required|array'
        ]);

        $pub = 'App\\Baceplace\\PubSub\\Publisher\\' . $validatedData['publisher'];
        if (class_exists($pub)) {
            throw new \Exception('Class not exists');
        }

        $sub = 'App\\Baceplace\\PubSub\\Publisher\\' . $validatedData['publisher'];
        if (class_exists($sub)) {
            throw new \Exception('Class not exists');
        }

        return ActionService::create($request->user(), $validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Action  $action
     * @return Action
     */
    public function show(Action $action): Action
    {
        return ActionService::show($action);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Action $action
     * @return Action
     * @throws \Exception
     */
    public function update(Request $request, Action $action): Action
    {
        $validatedData = $request->validate([
            'publisher'         => 'required|string',
            'publisher_data'    => 'required|array',
            'subscriber'        => 'required|string',
            'subscriber_data'   => 'required|array'
        ]);

        $pub = 'App\\Baceplace\\PubSub\\Publisher\\' . $validatedData['publisher'];
        if (class_exists($pub)) {
            throw new \Exception('Class not exists');
        }

        $sub = 'App\\Baceplace\\PubSub\\Publisher\\' . $validatedData['publisher'];
        if (class_exists($sub)) {
            throw new \Exception('Class not exists');
        }

        return ActionService::update($action, $validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Action  $action
     * @return void
     */
    public function destroy(Action $action): void
    {
        ActionService::destroy($action);
    }
}
