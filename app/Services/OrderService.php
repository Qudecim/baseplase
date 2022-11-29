<?php


namespace App\Services;


use App\Models\Order;
use App\Models\User;

class OrderService
{

    /**
     * Create new Order
     * @param User $user
     * @return Order
     */
    public static function create(User $user): Order
    {
        $order = new Order();
        $order->owner_id = $user->id;
        $order->save();

        return $order;
    }

}
