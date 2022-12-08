<?php

namespace App\Baceplace\PubSub\Publishers;

use App\Baceplace\PubSub\Publisher;

class OrderCreated extends Publisher
{

    /**
     * Process data for the broker
     *
     * @param mixed $data
     * @return mixed
     */
    protected static function boot(mixed $data): mixed
    {
        return $data;
    }

}
