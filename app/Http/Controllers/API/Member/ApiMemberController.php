<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\API\ApiBaseController;

use Illuminate\Http\Request;

use App\Model\MemberModel;
use App\Repositories\MemberRepository;
use App\Loggers\SMSLogger;

use TopClient;
use OpenimUsersAddRequest;
use OpenimUsersDeleteRequest;
use OpenimUsersGetRequest;
use Userinfos;

/**
 * @SWG\Swagger(
 *   @SWG\Info(
 *     title="Syrator",
 *     version="1.0.0"
 *   ),
 *   @SWG\Tag(name="Member", description="会员模块"),
 *   @SWG\Tag(name="System", description="系统模块"),
 *   @SWG\Tag(name="Upload", description="文件上传模块"),
 *   basePath="/api"
 * )
 */
class ApiMemberController extends ApiBaseController
{
    private $taobao_appid  = '23668242';
    private $taobao_secret = '0eb6a4ba9ee0febcb039beaa1f776d47';
    
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
     * @SWG\Post(
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
     * @SWG\Post(
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
     * @SWG\Post(
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
        
        // 验证码(六位随机数)
        $simpleCode = rand(100000,999999);
        
//         $params = array();
//         $params['Uid'] = "hdst001";
// 		$params['Key'] = "a6e468e5c8dbc56cb739";
// 		$params['smsMob'] = $param['phone'];
// 		if (e($param['type'])=="register") {
// 		    $params['smsText'] = "您正在注册账户，验证码：".$simpleCode."。请尽快使用，勿要告知他人。";		    
// 		} else if (e($param['type'])=="resetpassword") {
// 		    $params['smsText'] = "您正在重设账户密码，验证码：".$simpleCode."。请尽快使用，勿要告知他人。";		    
// 		} else {
// 		    $params['smsText'] = "您的验证码：".$simpleCode."。请尽快使用，勿要告知他人。";
// 		}
// 		$res = $this->post('',$params);
		
		$c = new TopClient;
		$c->appkey = "23524159";
		$c->secretKey = "cea4a3e427380fb8d543defa5a4b92b5";
		$c->format = "json";
		$req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend("123456");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("Sy应用框架");
        $req->setSmsParam("{\"code\":\"1234\",\"name\":\"Syrator\"}");
        $req->setRecNum("18672764673");
        $req->setSmsTemplateCode("SMS_57060017");
        $resp = $c->execute($req);
		
// 		echo json_encode($send_ver_code_request);
// 		exit();
		echo json_encode($resp);
		exit();
        
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
     * @SWG\Post(
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
     * @SWG\Post(
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
    
    /**
     * @SWG\Post(
     *   tags={"Member"},
     *   path="/member/bindwechat",
     *   summary="微信绑定手机号",
     *   description="微信登陆授权后，绑定手机号",
     *   @SWG\Parameter(name="phone", in="query", required=false, type="string", description="手机号"),
     *   @SWG\Parameter(name="vcode", in="query", required=false, type="string", description="验证码"),
     *   @SWG\Parameter(name="wechat_id", in="query", required=false, type="string", description="微信id"),
     *   @SWG\Parameter(name="wechat_name", in="query", required=false, type="string", description="微信名称"),
     *   @SWG\Parameter(name="wechat_nickname", in="query", required=false, type="string", description="微信昵称"),
     *   @SWG\Parameter(name="wechat_avatar", in="query", required=false, type="string", description="微信头像"),
     *   @SWG\Parameter(name="wechat_token", in="query", required=false, type="string", description="微信token"),
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
    public function bindWechat(Request $request)
    {
        // 获取参数
        $param = [
            'phone' => $request->input('phone'),
            'vcode' => $request->input('vcode'),
            'wechat_id' => $request->input('wechat_id'),
            'wechat_name' => $request->input('wechat_name'),
            'wechat_nickname' => $request->input('wechat_nickname'),
            'wechat_avatar' => $request->input('wechat_avatar'),
            'wechat_token' => $request->input('wechat_token'),
        ];
        
        // 参数检测
        if (empty(e($param['phone']))) {
            return self::responseFailed('301','用户名或者手机号不能为空');
        }
        
        if (empty(e($param['vcode']))) {
            return self::responseFailed('303','验证码不能为空');
        }
        
        if (empty(e($param['wechat_id']))) {
            return self::responseFailed('304','微信id不能为空');
        }
        
        if (empty(e($param['wechat_token']))) {
            return self::responseFailed('305','微信token不能为空');
        }
        
        // 验证验证码
        $res = SMSLogger::isValidate($param['phone'],$param['vcode'],"bindwechat");
        if ($res <= 0) {
            if ($res != -2) {
                return self::responseFailed('341','验证码错误');
            }
             
            return self::responseFailed('342','验证码超时');
        }
        
        //  查询用户
        $objMember = $this->repository->getByAccount($param['phone']);
        if ($objMember===null || empty($objMember)) {
            // 用户不存在则创建
            $objMemberNew = new MemberModel();            
            $objMemberNew->wechat_id = e($param['wechat_id']);
            $objMemberNew->wechat_name = e($param['wechat_name']);
            $objMemberNew->wechat_avatar = e($param['wechat_avatar']);
            $objMemberNew->wechat_nickname = e($param['wechat_nickname']);
            $objMemberNew->wechat_token = e($param['wechat_token']); 
            $objMemberNew->phone = e($param['phone']);
            $objMemberNew->password = bcrypt($objMemberNew->phone);
            $objMemberNew->account = e($param['phone']);
            $objMemberNew->nickname = e($param['wechat_nickname']);
            $objMemberNew->headimg = e($param['wechat_avatar']);
            
            if (!$objMemberNew->save()) {
                return self::responseFailed('500','创建用户失败');
            }
            
            // 注册送积分
            $pointsLog = new MemberPointsModel();
            $pointsLog->member_id = $objMemberNew->id;
            $pointsLog->product_id = 0;
            $pointsLog->cost = 1000;
            $pointsLog->title = '注册赠送积分';
            $pointsLog->save();
                       
            return self::responseSuccess('绑定成功',$objMemberNew);
        } else {
            // 存在则更新
            $objMember->wechat_id = e($param['wechat_id']);
            $objMember->wechat_name = e($param['wechat_name']);
            $objMember->wechat_avatar = e($param['wechat_avatar']);
            $objMember->wechat_nickname = e($param['wechat_nickname']);
            $objMember->wechat_token = e($param['wechat_token']);            
            if (!$objMember->save()) {
                return self::responseFailed('500','绑定失败');
            }
                       
            return self::responseSuccess('绑定成功',$objMember);
        }
        
        self::responseFailed('500','绑定失败');
    }
    
    /**
     * @SWG\Post(
     *   tags={"Member"},
     *   path="/member/taobao_openim",
     *   summary="获取阿里百川用户信息",
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
    public function getTaobaoOpenim(Request $request)
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
            if ($param['password']!=$objMember->password) {
                return self::responseFailed('342','密码错误');                
            }
        }
        
        // 获取阿里百川的用户信息
        if (empty($objMember->taobao_uid)) {
            // 先查询
            $c = new TopClient;
            $c->appkey = $this->taobao_appid;
            $c->secretKey = $this->taobao_secret;
            $c->format = "json";
            $req = new OpenimUsersGetRequest;
            $req->setUserids($objMember->phone);
            $resp = $c->execute($req);            
            if (count($resp->userinfos->userinfos)>0 && !empty($resp->userinfos->userinfos[0])) {
                $objMember->taobao_uid = $resp->userinfos->userinfos[0]->userid;
                $objMember->taobao_password = $resp->userinfos->userinfos[0]->password;
                if ($objMember->save()) {
                    return self::responseSuccess('成功',$objMember);
                }
            
                return self::responseFailed('500','系统错误');
            } else {            
                // 查询不到则创建
                $c = new TopClient;
                $c->appkey = $this->taobao_appid;
                $c->secretKey = $this->taobao_secret;
                $c->format = "json";
                $req = new OpenimUsersAddRequest;
                $userinfos = new Userinfos;
                $userinfos->nick=$objMember->nickname;
                $userinfos->icon_url=$objMember->headimg;
                $userinfos->email=$objMember->email;
                $userinfos->mobile=$objMember->phone;
                $userinfos->userid=$objMember->phone;
                $userinfos->password=bcrypt($objMember->phone);
                $userinfos->wechat=$objMember->wechat_name;
                $req->setUserinfos(json_encode($userinfos));
                $resp = $c->execute($req);
                
                if (empty($resp->fail_msg->string[0])) {
                    $objMember->taobao_uid = $resp->uid_succ->string[0];
                    $objMember->taobao_password = $userinfos->password;
                    if ($objMember->save()) {
                        return self::responseSuccess('成功',$objMember);                    
                    }
                    
                    return self::responseFailed('500','系统错误');
                }                
            }
        } else {
            // 存在，则直接返回
            return self::responseSuccess('成功',$objMember);            
        }
        
        return self::responseFailed('500','系统错误');
    }

    /**
     * @SWG\Post(
     *   tags={"Member"},
     *   path="/member/taobao_openim_delete",
     *   summary="从阿里百川删除用户信息",
     *   description="删除前必须验证会员账号和密码，账号为手机/邮箱",
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
    public function deleteTaobaoOpenim(Request $request)
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
            if ($param['password']!=$objMember->password) {
                return self::responseFailed('342','密码错误');
            }
        }
    
        // 获取阿里百川的用户信息
        if (!empty($objMember->taobao_uid)) {
            $c = new TopClient;
            $c->appkey = $this->taobao_appid;
            $c->secretKey = $this->taobao_secret;
            $c->format = "json";
            $req = new OpenimUsersDeleteRequest;
            $req->setUserids($objMember->taobao_uid);
            $resp = $c->execute($req);
            if ($resp->result->string[0]=="ok") {
                $objMember->taobao_uid = "";
                if ($objMember->save()) {
                    return self::responseSuccess('成功',$objMember);
                }
            }
        } else if (!empty($objMember->phone)) {
            $c = new TopClient;
            $c->appkey = $this->taobao_appid;
            $c->secretKey = $this->taobao_secret;
            $c->format = "json";
            $req = new OpenimUsersDeleteRequest;
            $req->setUserids($objMember->phone);
            $resp = $c->execute($req);
            if ($resp->result->string[0]=="ok") {
                $objMember->taobao_uid = "";
                if ($objMember->save()) {
                    return self::responseSuccess('成功',$objMember);
                }
            }
        }
    
        return self::responseFailed('500','系统错误');
    }
}
