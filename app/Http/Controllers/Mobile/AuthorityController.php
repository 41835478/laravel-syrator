<?php

namespace App\Http\Controllers\Mobile;

use Auth;
use App\Events\MemberLogin;
use App\Events\MemberLogout;
use Illuminate\Http\Request;

use EasyWeChat\Foundation\Application;
use App\Repositories\MemberRepository;


/**
 * 前台用户手机登录统一认证
 *
 */
class AuthorityController extends MobileController
{
    private $wechat_appid = 'wx2bc00aaab9559c36';
    private $wechat_secret = '1b085b8cd4db74c222e49c3e4da30620';

    /**
     * 添加路由过滤中间件
     */
    public function __construct(MemberRepository $repository)
    {
        parent::__construct();
        
        $this->repository = $repository;
    }

    // 登陆
    public function getLogin()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($user_agent, 'MicroMessenger') !== false) {
            // 如果是在微信中打开，则发起微信授权
            $options = [
                'debug'     => true,
                'app_id'    => $this->wechat_appid,
                'secret'    => $this->wechat_secret,
                'oauth'     => [
                    'scopes'   => ['snsapi_userinfo'],
                    'callback' => '/mobile/member/auth/loginwechat',
                ],
            ];
        
            $app = new Application($options);
            $oauth = $app->oauth;
        
            return $oauth->redirect();
        }
        
        return $this->view('member.auth.login');
    }

    public function postLogin(Request $request)
    {
        $redirectTo = site_path('', 'mobile');
        
        //认证凭证
        $credentials = [
            'phone'  => $request->input('phone'),
            'password'  => $request->input('password'),
            'is_locked' => 0,
        ];
        
        if (Auth::guard('member')->attempt($credentials, $request->has('remember'))) {
            event(new MemberLogin(auth()->guard('member')->user()));
            return redirect()->intended($redirectTo);
        } else {
            $msg = '“用户名”、“密码”错误或帐号已被锁定，请重新登录或联系客服！';
            return redirect()->back()->withInput()->withErrors(['attempt' => $msg]);
        }
    }

    // 退出
    public function getLogout()
    {
        @event(new MemberLogout(auth()->user()));
        Auth::guard('member')->logout();
        
        return redirect()->to(site_path('member/auth/login', 'mobile'));
    }
    
    // 注册
    public function register()
    {
        return $this->view('member.auth.register');
    }
    
    // 忘记密码
    public function resetPassword()
    {
        return $this->view('member.auth.resetpassword');
    }
    
    // 微信登录处理逻辑
    public function loginWechat(Request $request)
    {
        $options = [
            'debug'     => true,
            'app_id'    => $this->wechat_appid,
            'secret'    => $this->wechat_secret,
        ];
    
        $app = new Application($options);
        $oauth = $app->oauth;
    
        // 获取 OAuth 授权结果用户信息
        $wechat_member = $oauth->user();
    
        // 查询用户
        $objMember = $this->repository->getByWechatID($wechat_member->getId());
        if ($objMember!=null && !empty($objMember)) {
            // 更新token
            $objMember->wechat_token = $wechat_member->getToken();
            if ($objMember->save()) {
                if ($objMember->is_locked=='1') {
                    return redirect()->to(site_path('member/auth/error', 'mobile'))->withInput()->withErrors(['attempt' => '帐号可能已被锁定，请联系客服！']);
                }
                
                $redirectTo = site_path('', 'mobile');
                if (Auth::guard('member')->loginUsingId($objMember->id)) {
                    event(new MemberLogin(auth()->user()));
                    return redirect()->intended($redirectTo);
                } else {
                    return redirect()->to(site_path('member/auth/error', 'mobile'))->withInput()->withErrors(['attempt' => '帐号可能已被锁定，请联系客服！']);
                }
            } else {
                return redirect()->back()->withInput()->withErrors(['attempt' => '系统错误，请联系客服！']);
            }
        }
    
        // 第一次授权，进入绑定手机号的界面
        return $this->view('member.auth.bindwechat',compact('wechat_member'));
    }
    
    // 错误提示页面
    public function error(Request $request)
    {
        return $this->view('member.auth.error');
    }
}
