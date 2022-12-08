<?php

namespace App\Baceplace\PubSub;

class Broker
{

    /**
     * Get subscribers and pull data
     *
     * @param string $className
     * @param mixed $data
     * @return void
     */
    public static function filter(string $className, mixed $data): void
    {
        dd([$className, $data]);
    }

}
