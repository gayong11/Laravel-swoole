<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('laravels.received_request', function (Request $request, $app) {
            $request->query->set('get_key', 'swoole-get-param');
            $request->request->set('post_key', 'swoole-post-param');
        });

        Event::listen('laravels.generated_response', function (Request $request, Response $response, $app) {
            $response->headers->set('header-key', 'swoole-header');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
