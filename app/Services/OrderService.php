<?php


namespace App\Services;


use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Collection;

class OrderService
{
    /**
     * @return Collection
     */
    public static function index(): Collection
    {
        return auth()->user()->orders()->get();
    }

    /**
     * Create new Order
     * @param array $data
     * @return Order
     */
    public static function create(array $data): Order
    {
        $order = new Order();
        $order->owner_id = auth()->id();
        $order->status_id = 0;

        $order->fill($data)->save();

        return $order;
    }

    /**
     * @param Order $order
     * @return Order
     */
    public static function show(Order $order): Order
    {
        return $order;
    }

    /**
     * @param Order $order
     * @param array $data
     * @return Order
     */
    public static function update(Order $order, array $data): Order
    {
        $order->fill($data)->save();

        return $order;
    }

    /**
     * @param Order $order
     * @return void
     */
    public static function destroy(Order $order)
    {
        $order->delete();
    }

}
