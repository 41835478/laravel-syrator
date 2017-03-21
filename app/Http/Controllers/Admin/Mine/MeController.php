<?php

namespace App\Http\Controllers\Admin\Mine;

use App\Http\Controllers\Admin\BackController;

use App\Http\Requests\MeRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

/**
 * 我的账户控制器
 *
 */
class MeController extends BackController
{
    protected $user;


    public function __construct(UserRepository $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * 个人资料页面
     *
     * @return Response
     */
    public function getMeInforation()
    {
        $me = auth()->user();
        return $this->view('mine.index', compact('me'));
    }

    /**
     * 提交修改个人资料
     *
     * @return Response
     */
    public function putMeInforation(MeRequest $request)
    {        
        $this->user->updateMe(auth()->user(), $request->all());
        return redirect()->back()->with('message', '成功更新个人资料！');
    }
    
    /**
     * 提交修改头像
     *
     * @return Response
     */
    public function putMeAvatar(Request $request)
    {        
        $this->user->updateMeAvatar(auth()->user(), $request->all());
        return redirect()->back()->with('message', '成功更新个人头像！');
    }    
    
    /**
     * 提交新密码
     *
     * @return Response
     */
    public function putMePassword(MeRequest $request)
    {        
        $this->user->updateMe(auth()->user(), $request->all());
        return redirect()->back()->with('message', '成功更新密码！');
    }
}
