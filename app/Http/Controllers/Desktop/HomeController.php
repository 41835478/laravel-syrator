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
            'app_id'    => 'wx13b647618165d0c6',
            'secret'    => '7385e8edde0b99bb5684b70790e0e688',
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
