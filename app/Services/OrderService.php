<?php


namespace App\Services;


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
     * @param User $user
     * @param Order $order
     * @return Order
     * @throws \Exception
     */
    public static function show(User $user, Order $order): Order
    {
        if ($order->owner_id == $user->id) {
            return $order;
        }
        throw new \Exception('ops');
    }

    /**
     * @param User $user
     * @param Order $order
     * @param array $data
     * @return Order
     * @throws \Exception
     */
    public static function update(User $user, Order $order, array $data): Order
    {
        if ($order->owner_id == $user->id) {

            $order->fill($data)->save();

            return $order;
        }
        throw new \Exception('');
    }

    /**
     * @param User $user
     * @param Order $order
     * @return void
     */
    public static function destroy(User $user, Order $order)
    {
        if ($order->owner_id == $user->id) {
            $order->delete();
        }
    }

}
