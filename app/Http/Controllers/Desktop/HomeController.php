<?php

namespace App\Http\Controllers\Desktop;

use App\Jobs\ChangeLocale;

use Syrator\Plugin\WeChat\WeChatJSSDK;

class HomeController extends FrontController
{
    public function getIndex()
    {
        $jssdk = new WeChatJSSDK("wx13b647618165d0c6", "7385e8edde0b99bb5684b70790e0e688");
        $signPackage = $jssdk->GetSignPackage();
        return $this->view('index',compact('signPackage'));
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
