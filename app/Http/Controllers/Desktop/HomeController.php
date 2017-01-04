<?php

namespace App\Http\Controllers\Desktop;

use App\Jobs\ChangeLocale;

use EasyWeChat\Foundation\Application;

class HomeController extends FrontController
{
    public function getIndex()
    {
        $options = [
            'debug'     => true,
            'app_id'    => 'wx3cf0f39249eb0e60',
            'secret'    => 'f1c242f4f28f735d4687abb469072a29',
            'token'     => 'laravel-syrator-easywechat',
            'log' => [
                'level' => 'debug',
                'file'  => '/tmp/easywechat.log',
            ],
            // ...
        ];
        
        $app = new Application($options);
        
        $server = $app->server;
        $user = $app->user;
        
        return $this->view('index');
    }

    /**
     * Change Language
     */
    public function getLang(ChangeLocale $changeLocale)
    {
        $this->dispatch($changeLocale);

        return redirect()->back();
    }

}
