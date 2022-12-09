<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        return [
            'data' => OrderService::index($request->user()),
            'meta' => [
                'count' => OrderService::count($request->user()),
            ]
        ];
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
     * @param \App\Models\Order $order
     * @return Order
     * @throws \Exception
     */
    public function show(Order $order): Order
    {
        return OrderService::show($order);
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
        return OrderService::update($order, $validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function destroy(Order $order):void
    {
        OrderService::destroy($order);
    }
}
