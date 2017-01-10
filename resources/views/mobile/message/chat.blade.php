<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title></title>
</head>
<body>
<!--[if lt IE 9]>
<script src="https://g.alicdn.com/aliww/ww/json/json.js" charset="utf-8"></script>
<![endif]-->
<!-- 自动适配移动端与pc端 -->
<script src="https://g.alicdn.com/aliww/??h5.imsdk/4.0.1/scripts/yw/wsdk.js,h5.openim.kit/0.5.0/scripts/kit.js" charset="utf-8"></script>

<script>

    var search = location.search.substring(1);

    var s = search.split('&'),
            kv;

    var result = {};

    for(var i = 0, len = s.length; i < len; i++){
        kv = s[i].split('=');

        result[kv[0]] = decodeURIComponent(kv[1]);
    }

    WKIT.init({        	
        uid: result.uid || 'test0',
        appkey: result.appkey || '23018936',
        credential: result.pwd || '123456',
        touid: result.to || 'test1',
        onMsgReceived: function(data){
            console.log(data);
        },
        onMsgSent: function(data){
            console.log(data);
        },

        autoMsg: '这是默认用户打开页面给客服发的第一条消息',
        titleBar: false,
        title: 'sss',
        customUrl: ' ',
        onBack: function(){
          console.log('back');
        },
        onUploaderError: function(error){
            console.log(error);
        },

        hosts:{
        	msgHost:'im.syrator.com',
        	imageHost:'mobileim.im.syrator.com'
    	}
    });

</script>
</body>
</html>