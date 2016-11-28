<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>layer</title>
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ _asset(ref('bootstrap.css')) }}" />
    <link href="{{ _asset('back/dist/css/syrator.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="layerForm" style="margin: 10px;">

                <div class="box-header with-border">
                  <p>用户详情</p>
                  <div class="basic_info bg-info">
                     <ul>
                        <li>登录名：<span class="text-primary">{{ $user->username }}</span></li>
                        <li>昵称：<span class="text-primary">{{ $user->nickname }}</span></li>
                        <li>真实姓名：<span class="text-primary">{{ $user->realname }}</span></li>
                        <li>电子邮件：<span class="text-primary">{{ $user->email }}</span></li>
                        <li>手机号码：<b>{{ $user->phone }}</b></li>
                        <li>状态：<b>{{ ($user->is_locked === 0) ? '正常' : '锁定' }}</b></li>
                        <li>角色(用户组)：<b>{{ $own_role->display_name }}</b>
                        </li>
                    </ul>
                  </div>
                </div><!-- /.box-header -->
</div>
</body>
</html>
