<?php

namespace App\Listeners;

use App\Events\TestEvent;
use Hhxsv5\LaravelS\Swoole\Task\Event;
use Hhxsv5\LaravelS\Swoole\Task\Listener;
use Illuminate\Support\Facades\Log;

class TestEventListener extends Listener
{
    public function __construct()
    {
    }

    public function handle(Event $event)
    {
        Log::info(__CLASS__ . '：开始处理', [$event->getData()]);
        sleep(3);
        Log::info(__CLASS__ . ': 处理完毕');
    }
}
