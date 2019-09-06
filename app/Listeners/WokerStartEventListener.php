<?php

namespace App\Listeners;

use Hhxsv5\LaravelS\Swoole\Events\WorkerStartInterface;
use Swoole\Http\Server;

class WokerStartEventListener implements WorkerStartInterface
{
    public function __construct()
    {
    }

    public function handle(Server $server, $workerId)
    {
        Log::info('Worker/Task Process Started');
    }
}
