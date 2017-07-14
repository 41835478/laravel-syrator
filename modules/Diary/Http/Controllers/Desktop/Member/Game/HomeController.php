<?php namespace Modules\Diary\Http\Controllers\Desktop\Member\Game;

class HomeController extends GameController
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
