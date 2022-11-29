<?php


namespace App\Baseplace\Order;

use \App\Models\Order as OrderModel;

class Order
{

    private OrderModel $order;

    /**
     * Order constructor.
     * It can work only created Order in DB
     * @param OrderModel $order
     */
    public function __construct(OrderModel $order)
    {
        $this->order = $order;
    }

}
