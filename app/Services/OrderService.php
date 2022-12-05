<?php


namespace App\Services;


use App\Baseplace\Responder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Collection;

class OrderService
{
    /**
     * @param User $user
     * @return Collection
     */
    public static function index(User $user): Collection
    {
        return $user->orders()->get();
    }

    /**
     * Create new Order
     * @param User $user
     * @param array $data
     * @return Order
     */
    public static function create(User $user, array $data): Order
    {
        $order = new Order();
        $order->owner_id = $user->id;
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
    public static function update( Order $order, array $data): Order
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

    /**
     * @param User $user
     * @return int
     */
    public static function count(User $user): int
    {
        return $user->orders()->count();
    }

}
