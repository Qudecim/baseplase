<?php

namespace App\Jobs;

use App\Baceplace\PubSub\Publisher;
use App\Baceplace\PubSub\Subscriber;
use App\Models\Action;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Action $action;
    public Subscriber $subscriber;
    public mixed $actionData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Action $action, Subscriber $subscriber, mixed $actionData)
    {
        $this->action = $action;
        $this->subscriber = $subscriber;
        $this->actionData = $actionData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->subscriber->handle($this->action, $this->actionData);
    }
}
