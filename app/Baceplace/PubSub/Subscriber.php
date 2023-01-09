<?php

namespace App\Baceplace\PubSub;

use App\Models\Action;

abstract class Subscriber
{

    abstract public function handle(Action $action, mixed $mixed): void;

}
