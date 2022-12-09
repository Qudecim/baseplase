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
        $actions = auth()->user()->actions()->where('publisher', $className)->get();
        foreach ($actions as $action) {
            $valid = true;

            foreach ($action as $key => $value) {
                if (!isset($data->$key)) {
                    $valid = false;
                    continue;
                }
                if ($data->$key != $value) {
                    $valid = false;
                    continue;
                }
            }


        }

        dd([$className, $data]);
    }

}
