<?php

namespace App\Baceplace\PubSub;

use App\Baceplace\PubSub\Broker;

abstract class Publisher
{

    /**
     * Process data for the broker
     *
     * @param mixed $data
     * @return mixed
     */
    abstract protected static function boot(mixed $data): mixed;

    /**
     * @param mixed $data
     * @return void
     */
    public static function dispatch(mixed $data): void
    {
        $publisher = get_called_class();
        $bootData = $publisher::boot($data);
        Broker::filter($publisher, $bootData);
    }

}
