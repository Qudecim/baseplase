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
    public function index(): Collection
    {
        return OrderService::index();
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
        return OrderService::create($validatedData);
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
