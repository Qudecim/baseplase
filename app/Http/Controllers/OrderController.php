<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(Request $request): Collection
    {
        return OrderService::all($request->user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Order
     */
    public function store(Request $request): Order
    {
        $validatedData = $request->validate([
            'status_id' => 'int',
        ]);
        return OrderService::create($request->user(), $validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param \App\Models\Order $order
     * @return Order
     * @throws \Exception
     */
    public function show(Request $request, Order $order): Order
    {
        return OrderService::show($request->user(), $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return Order
     * @throws \Exception
     */
    public function update(Request $request, Order $order): Order
    {
        $validatedData = $request->validate([
            'status_id' => 'int',
        ]);
        return OrderService::update($request->user(), $order, $validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function destroy(Request $request,Order $order):void
    {
        OrderService::destroy($request->user(), $order);
    }
}
