<?php


namespace App\Services;


use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderService
{
    /**
     * @param User $user
     * @return Collection
     */
    public static function all(User $user): Collection
    {
        return Order::where('owner_id', $user->id)->get();
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
        self::fill($order, $data);
        $order->save();

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
        throw new \Exception('');
    }

    /**
     * @param User $user
     * @param Order $order
     * @param array $data
     * @return Order
     * @throws \Exception
     */
    public static function update(User $user, Order $order, array $data)
    {
        if ($order->owner_id == $user->id) {

            self::fill($order, $data);

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

    /**
     * Fill data
     * @param Order $order
     * @param array $data
     * @return void
     */
    private static function fill(Order $order, array $data)
    {
        if (isset($data['status_id'])) {
            $order->status_id = $data['status_id'];
        }
    }


}
