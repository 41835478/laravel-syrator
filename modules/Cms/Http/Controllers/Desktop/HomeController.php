<?php namespace Modules\Cms\Http\Controllers\Desktop;

use App\Jobs\ChangeLocale;
use Illuminate\Http\Request;

class HomeController extends FrontController
{
    public function getIndex(Request $request)
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
