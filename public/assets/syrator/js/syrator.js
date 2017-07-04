function SyDocument () {
	this.get = function(id) {
		return document.getElementById(id);
	};
	this.qsa = function(sel) {
		return [].slice.call(document.querySelectorAll(sel));
	};
};

//对Date的扩展，将 Date 转化为指定格式的String
//月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符， 
//年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字) 
//例子： 
//(new Date()).Format("yyyy-MM-dd hh:mm:ss.S") 
//(new Date()).Format("yyyy-M-d h:m:s.S")
Date.prototype.Format = function (fmt) {
	var o = {
		"M+": this.getMonth() + 1, //月份 
		"d+": this.getDate(), //日 
		"h+": this.getHours(), //小时 
		"m+": this.getMinutes(), //分 
		"s+": this.getSeconds(), //秒 
		"q+": Math.floor((this.getMonth() + 3) / 3), //季度 
		"S": this.getMilliseconds() //毫秒 
	};
	if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
	for (var k in o) if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
	return fmt;
}

/**参数说明：
 * 根据长度截取先使用字符串，超长部分追加…
 * str 对象字符串
 * len 目标字节长度
 * 返回值： 处理结果字符串
 */
function cutString(str, len) {
    //length属性读出来的汉字长度为1
    if(str.length*2 <= len) {
        return str;
    }
    var strlen = 0;
    var s = "";
    for(var i = 0;i < str.length; i++) {
        s = s + str.charAt(i);
        if (str.charCodeAt(i) > 128) {
            strlen = strlen + 2;
            if(strlen >= len){
                return s.substring(0,s.length-1) + "...";
            }
        } else {
            strlen = strlen + 1;
            if(strlen >= len){
                return s.substring(0,s.length-2) + "...";
            }
        }
    }
    return s;
}