<?php

namespace App\Baceplace\PubSub\Subscribers;

use App\Baceplace\PubSub\Subscriber;
use App\Models\Action;

class ChangeStatus extends Subscriber
{

    /**
     * @param Action $action
     * @param mixed $data
     * @return void
     */
    public function handle(Action $action, mixed $data): void
    {

    }

}
