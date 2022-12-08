<?php

namespace App\Baceplace\PubSub;

abstract class Subscriber
{

    abstract public function handle(mixed $mixed): void;

}
