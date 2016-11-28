/**
 * 判断值是否为空
 */
function isEmpty(value) {
	if (!value) {
		 return true;
	}
	
	//把所有空格去掉
	var value = value.replace(/[]/g,"");
	if(value.length == 0){
		return true;
	}
}

/**
 * 检查是否为合法的手机号码
 */
function validateMobile(mobile) {
	if(mobile.length==0 || mobile.length!=11) {
		return false; 
    }
	
	var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
	if(!myreg.test(mobile)) {
		return false;
	}
	
	return true;
} 