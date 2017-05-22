<?php

namespace App\Http\Controllers\Admin\Mine;

use App\Http\Controllers\Admin\BackController;
use Zizaco\Entrust\EntrustFacade as Entrust;

use App\Http\Requests\MeRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class MineController extends BackController
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        parent::__construct();
        $this->user = $user;
        
        if(!Entrust::can('admin.mine')) {
            $this->middleware('deny');
        }
    }

    public function getMeInforation()
    {
        if(!Entrust::can('admin.mine.inforation')) {
            return deny();
        }
        
        $me = auth()->user();
        return $this->view('mine.index', compact('me'));
    }

    public function putMeInforation(MeRequest $request)
    {        
        if(!Entrust::can('admin.mine.inforation')) {
            return deny();
        }
        
        $this->user->updateMe(auth()->user(), $request->all());
        return redirect()->back()->with('message', '成功更新个人资料！');
    }
    
    public function putMeAvatar(Request $request)
    {
        if(!Entrust::can('admin.mine.avatar')) {
            return deny();
        }
        
        $this->user->updateMeAvatar(auth()->user(), $request->all());
        return redirect()->back()->with('message', '成功更新个人头像！');
    }    
    
    public function putMePassword(MeRequest $request)
    {  
        if(!Entrust::can('admin.mine.password')) {
            return deny();
        }
        
        $this->user->updateMe(auth()->user(), $request->all());
        return redirect()->back()->with('message', '成功更新密码！');
    }
}
