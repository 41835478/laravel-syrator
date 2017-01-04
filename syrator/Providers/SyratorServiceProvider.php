<?php

namespace Syrator\Providers;

use Illuminate\Support\ServiceProvider;
use Syrator\Extensions\SyratorValidator;
use Syrator\Extensions\SyratorBlade;

//use Validator;

/**
 * SyratorValidator 扩展自定义验证类 服务提供者
 *
 */
class SyratorServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*注册自定义Blade标签*/
        SyratorBlade::register();
        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages) {
            return new SyratorValidator($translator, $data, $rules, $messages);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
