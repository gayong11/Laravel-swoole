<?php

namespace App\Services;

use Hhxsv5\LaravelS\Swoole\WebSocketHandlerInterface;
use Illuminate\Support\Facades\Log;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

class WebSocketService implements WebSocketHandlerInterface
{
    public function __construct()
    {

    }

    // 链接建立时触发
    public function onOpen(Server $server, Request $request)
    {
        Log::info('WebSocket 建立连接');
        $server->push($request->fd, 'Welcome to WebSocket Server built on LaravelS');
    }

    // 收到消息时触发
    public function onMessage(Server $server, Frame $frame)
    {
        $server->push($frame->fd, 'This is a message sent from WebSocket Server at' . date('Y-m-d H:i:s'));
    }

    // 关闭链接时触发
    public function onClose(Server $server, $fd, $reactorId)
    {
        Log::info('WebSocket 连接关闭');
    }
}