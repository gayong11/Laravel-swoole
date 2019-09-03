<?php

namespace App\Jobs\Timer;

use Hhxsv5\LaravelS\Swoole\Timer\CronJob;
use Illuminate\Support\Facades\Log;

class TestCronJob extends CronJob
{
    protected $i = 0;

    public function run()
    {
        Log::info(__METHOD__, ['start', $this->i, microtime(true)]);
        $this->i++;
        Log::info(__METHOD__, ['end', $this->i, microtime(true)]);

        if ($this->i == 3) {
            Log::info(__METHOD__, ['stop', $this->i, microtime(true)]);
            $this->stop();
        }
    }

    /**
     * 每隔1000ms执行一次任务
     * @return int
     */
    public function interval()
    {
        return 1000;
    }

    /**
     * 是否设置之后立即出发run方法
     * @return bool
     */
    public function isImmediate()
    {
        return false;
    }

}