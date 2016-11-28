<?php

namespace App\Http\Controllers\Desktop;

use App\Jobs\ChangeLocale;

class HomeController extends FrontController
{
    public function getIndex()
    {
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
