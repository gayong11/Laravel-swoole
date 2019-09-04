<?php

namespace App\Jobs;

use Hhxsv5\LaravelS\Swoole\Task\Task;
use Illuminate\Support\Facades\Log;

class TestTask extends Task
{
    // 待处理数据
    private $data;

    // 处理结果
    private $result;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // 任务投递调用task 回调时触发,等同于Swoole中的onTask逻辑
    public function handle()
    {
        Log::info(__CLASS__ . ': 开始处理任务', [$this->data]);
        sleep(3);
        $this->result = 'The result of ' . $this->data . ' is balabalabala';
    }

    // 任务完成调用 finish回调时触发,等同于Swoole中的onFinish逻辑
    public function finish()
    {
        Log::info(__CLASS__ . ': 处理任务完成', [$this->result]);
    }
}