<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\API\ApiBaseController;

use Illuminate\Http\Request;

use App\Repositories\MemberRepository;
use App\Loggers\SMSLogger;

/**
 * @SWG\Swagger(
 *   @SWG\Info(
 *     title="Syrator",
 *     version="1.0.0"
 *   ),
 *   @SWG\Tag(name="Member", description="会员模块"),
 *   @SWG\Tag(name="Material", description="材料模块"),
 *   @SWG\Tag(name="Servicer", description="服务商模块"),
 *   @SWG\Tag(name="Device", description="设备租赁模块"),
 *   @SWG\Tag(name="Finance", description="保险金融模块"),
 *   @SWG\Tag(name="Project", description="工程信息模块"),
 *   @SWG\Tag(name="Freight", description="货运模块"),
 *   @SWG\Tag(name="Task", description="需求模块"),
 *   @SWG\Tag(name="Forum", description="论坛模块"),
 *   schemes={"http","https"},
 *   basePath="/api"
 * )
 */
class ApiMemberController extends ApiBaseController
{
    protected $host = "http://utf8.sms.webchinese.cn";
    
    function get($url, $parameters = array())
    {
        // 拼接url
        $url = "{$this->host}{$url}";
    
        // 如果带参数，拼接参数
        if (!empty($parameters))
        {
            $url = $url . '?' . http_build_query ($parameters);
        }
    
        // 开启一个curl对话
        $ci = curl_init();
    
        // Curl 设置
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ci, CURLOPT_URL, $url );
    
        // Curl 执行
        $response = curl_exec($ci);
    
        // Curl 关闭
        curl_close ($ci);
    
        return $response;
    }
    
    function post($url, $parameters = array())
    {
        // 拼接url
        $url = "{$this->host}{$url}";
    
        $postfields = http_build_query($parameters);
    
        // 开启一个curl对话
        $ci = curl_init();
    
        // Curl 设置
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ci, CURLOPT_URL, $url );
        curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
    
        // Curl 执行
        $response = curl_exec($ci);
    
        // Curl 关闭
        curl_close ($ci);
    
        return $response;
    }
    
    public function __construct(MemberRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    
    /**
     * @SWG\Get(
     *   tags={"Member"},
     *   path="/member/login",
     *   summary="会员登录",
     *   description="会员使用账号和密码登录，账号为手机/邮箱",
     *   @SWG\Parameter(name="account", in="query", required=true, type="string", description="登录账号"),
     *   @SWG\Parameter(name="password", in="query", required=true, type="string", description="登录密码"),
     *   @SWG\Response(
     *     response=200,
     *     description="请求成功且业务逻辑正确"
     *   ),
     *   @SWG\Response(
     *     response=299,
     *     description="请求成功但业务逻辑上有错误(具体看返回数据中的code和description)"
     *   ),
     *   @SWG\Response(
     *     response="500",
     *     description="系统错误"
     *   )
     * )
     */
    public function login(Request $request)
    {        
        // 获取参数
        $param = [
            'account' => $request->input('account'),
            'password' => $request->input('password'),
        ];
        
        // 参数检测
        if (empty(e($param['account']))) {
            return self::responseFailed('301','用户名不能为空');
        }
        
        if (empty(e($param['password']))) {
            return self::responseFailed('302','密码不能为空');
        }
        
        //  查询用户
        $objMember = $this->repository->getByAccount($param['account']);
        if ($objMember===null || empty($objMember)) {
            return self::responseFailed('341','用户不存在');
        }
        
        // 验证密码
        $res = password_verify($param['password'],$objMember->password);
        if ($res!=1) {
            return self::responseFailed('342','密码错误');
        }
        
        $objMember->password = "";
        session()->set('member', $objMember);

        return self::responseSuccess('登录成功',$objMember);
    }
    
    /**
     * @SWG\Get(
     *   tags={"Member"},
     *   path="/member/register",
     *   summary="会员注册",
     *   description="目前只支持手机注册，需要传入手机号，密码和验证码",
     *   @SWG\Parameter(name="phone", in="query", required=true, type="string", description="手机号"),
     *   @SWG\Parameter(name="password", in="query", required=true, type="string", description="登录密码"),
     *   @SWG\Parameter(name="vcode", in="query", required=true, type="string", description="验证码"),
     *   @SWG\Response(
     *     response=200,
     *     description="请求成功且业务逻辑正确"
     *   ),
     *   @SWG\Response(
     *     response=299,
     *     description="请求成功但业务逻辑上有错误(具体看返回数据中的code和description)"
     *   ),
     *   @SWG\Response(
     *     response="500",
     *     description="系统错误"
     *   )
     * )
     */
    public function register(Request $request)
    {
        // 获取参数
        $param = [
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'vcode' => $request->input('vcode'),
        ];
    
        // 参数检测
        if (empty(e($param['phone']))) {
            return self::responseFailed('301','用户名不能为空');
        }
    
        if (empty(e($param['password']))) {
            return self::responseFailed('302','密码不能为空');
        }
        
        if (empty(e($param['vcode']))) {
            return self::responseFailed('303','验证码不能为空');
        }
    
        //  查询用户
        $objMember = $this->repository->getByAccount($param['phone']);
        if ($objMember===null || empty($objMember)) {
        	// 创建用户
        	// 先验证验证码
            $res = SMSLogger::isValidate($param['phone'],$param['vcode'],"register");
	        if ($res <= 0) {
	            if ($res != -2) {
	                return self::responseFailed('341','验证码错误');   
	            }   
	            
	            return self::responseFailed('342','验证码超时'); 
	        } 
	        
	        // 创建用户
	        $param['password'] = bcrypt(e($param['password']));
	        $objMemberNew = $this->repository->store($param); 
	        if ($objMemberNew===null || empty($objMemberNew)) {
                return self::responseFailed('500','创建用户失败');	            
	        }
	        
            return self::responseSuccess('注册成功',$objMemberNew);
        } else {
            return self::responseFailed('341','该手机号已经被占用');
        }
    }
    
    /**
     * @SWG\Get(
     *   tags={"Member"},
     *   path="/member/sendverifycode",
     *   summary="发送手机验证码",
     *   description="发送手机验证码，验证码类型决定了发送短信的内容和用途，后台可以进行管理",
     *   @SWG\Parameter(name="phone", in="query", required=true, type="string", description="手机号"),
     *   @SWG\Parameter(name="type", in="query", required=true, type="string", description="验证码类型"),
     *   @SWG\Response(
     *     response=200,
     *     description="请求成功且业务逻辑正确"
     *   ),
     *   @SWG\Response(
     *     response=299,
     *     description="请求成功但业务逻辑上有错误(具体看返回数据中的code和description)"
     *   ),
     *   @SWG\Response(
     *     response="500",
     *     description="系统错误"
     *   )
     * )
     */
    public function sendVerifyCode(Request $request)
    {
        // 获取参数
        $param = [
            'phone' => $request->input('phone'),
            'type' => $request->input('type'),
        ];
    
        // 参数检测
        if (empty(e($param['phone']))) {
            return self::responseFailed('301','手机号不能为空');
        }
        
        if (empty(e($param['type']))) {
            return self::responseFailed('302','类型不能为空');
        }
        
        // 验证码
        $simpleCode = rand(100000,999999);

        // 发送验证码
        $params = array();
		$params['Uid'] = "hdst001";
		$params['Key'] = "a6e468e5c8dbc56cb739";
		$params['smsMob'] = $param['phone'];
		if (e($param['type'])=="register") {
		    $params['smsText'] = "您正在注册账户，验证码：".$simpleCode."。请尽快使用，勿要告知他人。";		    
		} else if (e($param['type'])=="resetpassword") {
		    $params['smsText'] = "您正在重设账户密码，验证码：".$simpleCode."。请尽快使用，勿要告知他人。";		    
		} else {
		    $params['smsText'] = "您的验证码：".$simpleCode."。请尽快使用，勿要告知他人。";
		}
        $res = $this->post('',$params);  
        
        // 记录日志
        $log = [
            'phone'   => $param['phone'],
            'type'    => $param['type'],
            'url'     => site_url('member/sendverifycode', 'api'),
            'content' => $params['smsText'],
            'vcode'   => $simpleCode,
            'res'   => $res,
        ];
        SMSLogger::write($log);
        
        if ($res > 0) {             
            return self::responseSuccess('发送成功',$log);
        } else if ($res == -4){
            $log = [
                'phone'   => $param['phone'],
                'type'    => $param['type'],
                'url'     => site_url('member/sendverifycode', 'api'),
                'content' => $params['smsText'],
                'vcode'   => $simpleCode,
                'res'   => $res,
            ];
            SMSLogger::write($log);
            return self::responseFailed('351','手机号格式不正确');
        } else {
            $log = [
                'phone'   => $param['phone'],
                'type'    => $param['type'],
                'url'     => site_url('member/sendverifycode', 'api'),
                'content' => $params['smsText'],
                'vcode'   => $simpleCode,
                'res'   => $res,
            ];
            SMSLogger::write($log);
            return self::responseFailed('350','发送失败');
        }
    }
    
    /**
     * @SWG\Get(
     *   tags={"Member"},
     *   path="/member/validateverifycode",
     *   summary="验证手机验证码",
     *   description="验证手机验证码",
     *   @SWG\Parameter(name="phone", in="query", required=true, type="string", description="手机号"),
     *   @SWG\Parameter(name="type", in="query", required=true, type="string", description="验证码类型"),
     *   @SWG\Parameter(name="vcode", in="query", required=true, type="string", description="验证码"),
     *   @SWG\Response(
     *     response=200,
     *     description="请求成功且业务逻辑正确"
     *   ),
     *   @SWG\Response(
     *     response=299,
     *     description="请求成功但业务逻辑上有错误(具体看返回数据中的code和description)"
     *   ),
     *   @SWG\Response(
     *     response="500",
     *     description="系统错误"
     *   )
     * )
     */
    public function validateVerifyCode(Request $request)
    {
        // 获取参数
        $param = [
            'phone' => $request->input('phone'),
            'type' => $request->input('type'),
            'vcode' => $request->input('vcode'),
        ];
    
        // 参数检测
        if (empty(e($param['phone']))) {
            return self::responseFailed('301','手机号不能为空');
        }
    
        if (empty(e($param['type']))) {
            return self::responseFailed('302','类型不能为空');
        }     
        
        if (empty(e($param['vcode']))) {
            return self::responseFailed('303','验证码不能为空');
        }   

        $res = SMSLogger::isValidate($param['phone'],$param['vcode'],$param['type']);
        if ($res <= 0) {
            if ($res != -2) {
                return self::responseFailed('341','验证码错误');
            }
             
            return self::responseFailed('342','验证码超时');
        }  
        
        return self::responseSuccess('验证成功',$res);
    }
    
    /**
     * @SWG\Get(
     *   tags={"Member"},
     *   path="/member/resetpassword",
     *   summary="重置密码",
     *   description="通过手机，验证通过后，可以重设密码",
     *   @SWG\Parameter(name="phone", in="query", required=false, type="string", description="手机号"),
     *   @SWG\Parameter(name="password", in="query", required=false, type="string", description="登录密码"),
     *   @SWG\Parameter(name="vcode", in="query", required=false, type="string", description="验证码"),
     *   @SWG\Response(
     *     response=200,
     *     description="请求成功且业务逻辑正确"
     *   ),
     *   @SWG\Response(
     *     response=299,
     *     description="请求成功但业务逻辑上有错误(具体看返回数据中的code和description)"
     *   ),
     *   @SWG\Response(
     *     response="500",
     *     description="系统错误"
     *   )
     * )
     */
    public function resetPassword(Request $request)
    {
        // 获取参数
        $param = [
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'vcode' => $request->input('vcode'),
        ];
    
        // 参数检测
        if (empty(e($param['phone']))) {
            return self::responseFailed('301','手机号不能为空');
        }
    
        if (empty(e($param['password']))) {
            return self::responseFailed('302','密码不能为空');
        }
    
        if (empty(e($param['vcode']))) {
            return self::responseFailed('303','验证码不能为空');
        }
    
        //  查询用户
        $objMember = $this->repository->getByAccount($param['phone']);
        if ($objMember===null || empty($objMember)) {
            return self::responseFailed('341','用户不存在');
        }
        
        // 再验证验证码
        $res = SMSLogger::isValidate($param['phone'],$param['vcode'],"resetpassword");
        if ($res <= 0) {
            if ($res != -2) {
                return self::responseFailed('341','验证码错误');
            }
             
            return self::responseFailed('342','验证码超时');
        }
        
        // 修改密码
    	$objMember->password = bcrypt(e($param['password']));
    	if ($objMember->save()) {
    		return self::responseSuccess('修改成功',$objMember);
        }
        
        return self::responseFailed('500','修改失败');
    }
}
