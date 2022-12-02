<?php


namespace App\Services;


use App\Models\Order;
use Illuminate\Http\Request;

class OrderService
{

    /**
     * Create new Order
     * @param Request $request
     * @return Order
     */
    public static function create(Request $request): Order
    {
        $order = new Order();
        $order->owner_id = $request->user()->id;
        $order->save();

        return $order;
    }

}
