<?php

namespace Syrator\Extensions;

class SyratorSecurity
{    
	public static function encrypt($input, $key) {
		$size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB); 
		$input = SyratorSecurity::pkcs5_pad($input, $size); 
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, ''); 
		$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND); 
		mcrypt_generic_init($td, $key, $iv); 
		$data = mcrypt_generic($td, $input); 
		mcrypt_generic_deinit($td); 
		mcrypt_module_close($td); 
		$data = base64_encode($data); 
		return $data; 
	}
	
	private static function pkcs5_pad ($text, $blocksize) {
		$pad = $blocksize - (strlen($text) % $blocksize); 
		return $text . str_repeat(chr($pad), $pad); 
	}
	
	public static function decrypt($sStr, $sKey) {
		$decrypted= mcrypt_decrypt(
			MCRYPT_RIJNDAEL_128,
			$sKey, 
			base64_decode($sStr), 
			MCRYPT_MODE_ECB
		);
		$dec_s = strlen($decrypted); 
		$padding = ord($decrypted[$dec_s-1]); 
		$decrypted = substr($decrypted, 0, -$padding);
		return $decrypted;
	}
	
	/**
	 * This was AES-128 / CBC / PKCS5Padding
	 * return base64_encode string
	 * @author Terry
	 * @param string $plaintext
	 * @param string $key
	 * @return string
	 */
	public static function AesEncrypt_16($plaintext,$key,$iv)
	{
	    $plaintext = trim($plaintext);
	    if ($plaintext == '') return '';
	    $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);	
	
	    //PKCS5Padding
	    $padding = $size - strlen($plaintext) % $size;
	    // 添加Padding
	    $plaintext .= str_repeat(chr($padding), $padding);	
	
	    $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
	    $key=self::substr($key, 0, mcrypt_enc_get_key_size($module));
	    // $iv = str_repeat("\0", $size);      //此处蛋碎一地啊，java里面的16个空数组对应的是\0.由于不懂java，这个地方百度了很久，后来是请教主管才搞定的。
	    /* Intialize encryption */
	    mcrypt_generic_init($module, $key, $iv);	
	
	    /* Encrypt data */
	    $encrypted = mcrypt_generic($module, $plaintext);	
	
	    /* Terminate encryption handler */
	    mcrypt_generic_deinit($module);
	    mcrypt_module_close($module);
	    return bin2hex($encrypted);
	}
	
	public static function AesEncrypt_Base64_Encode($plaintext,$key,$iv)
	{
	    $plaintext = trim($plaintext);
	    if ($plaintext == '') return '';
	    $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	
	    //PKCS5Padding
	    $padding = $size - strlen($plaintext) % $size;
	    // 添加Padding
	    $plaintext .= str_repeat(chr($padding), $padding);
	
	    $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
	    $key=self::substr($key, 0, mcrypt_enc_get_key_size($module));
	    // $iv = str_repeat("\0", $size);      //此处蛋碎一地啊，java里面的16个空数组对应的是\0.由于不懂java，这个地方百度了很久，后来是请教主管才搞定的。
	    /* Intialize encryption */
	    mcrypt_generic_init($module, $key, $iv);
	
	    /* Encrypt data */
	    $encrypted = mcrypt_generic($module, $plaintext);
	
	    /* Terminate encryption handler */
	    mcrypt_generic_deinit($module);
	    mcrypt_module_close($module);
	    return base64_encode($encrypted);
	}
	
	/**
	 * Returns the length of the given string.
	 * If available uses the multibyte string function mb_strlen.
	 * @param string $string the string being measured for length
	 * @return integer the length of the string
	 */
	private static function strlen($string)
	{
	    return extension_loaded('mbstring') ? mb_strlen($string,'8bit') : strlen($string);
	}
	
	
	/**
	 * Returns the portion of string specified by the start and length parameters.
	 * If available uses the multibyte string function mb_substr
	 * @param string $string the input string. Must be one character or longer.
	 * @param integer $start the starting position
	 * @param integer $length the desired portion length
	 * @return string the extracted part of string, or FALSE on failure or an empty string.
	 */
	private static function substr($string,$start,$length)
	{
	    return extension_loaded('mbstring') ? mb_substr($string,$start,$length,'8bit') : substr($string,$start,$length);
	}
	/**
	 * This was AES-128 / CBC / PKCS5Padding
	 * @author Terry
	 * @param string $encrypted     base64_encode encrypted string
	 * @param string $key
	 * @throws CException
	 * @return string
	 */
	public static function AesDecrypt($encrypted, $key = null)
	{
	    if ($encrypted == '') return '';
	    $ciphertext_dec = base64_decode($encrypted);
	    $module = mcrypt_module_open(MCRYPT_RIJNDAEL_192, '', MCRYPT_MODE_ECB, '');
	    $key=self::substr($key, 0, mcrypt_enc_get_key_size($module));
	
	    $iv = str_repeat("\0", 16);    //解密的初始化向量要和加密时一样。
	    /* Initialize encryption module for decryption */
	    mcrypt_generic_init($module, $key, $iv);	
	
	    /* Decrypt encrypted string */
	    $decrypted = mdecrypt_generic($module, $ciphertext_dec);	
	
	    /* Terminate decryption handle and close module */
	    mcrypt_generic_deinit($module);
	    mcrypt_module_close($module);
	    $a = rtrim($decrypted,"\0");
	
	    return rtrim($decrypted,"\0");
	}
}
