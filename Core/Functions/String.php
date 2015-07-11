<?php
use Core\Classes\Config;
function str_generate($length = 20) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
	$code = "";
	$clen = strlen($chars) - 1;
	while (strlen($code) < $length) {
		$code .= $chars[mt_rand(0, $clen)];
	}
	return $code;
}
function mb_ucfirst($str) {
	return mb_strtoupper(mb_substr($str, 0, 1)) . mb_substr($str, 1);
}
function str_to_url($str) {
	$search = array(
			',',
			'\'',
			'"',
			'.',
			'!',
			'@',
			'%',
			'$',
			'&',
			'?',
			'(',
			')',
			'*',
			'^',
			':',
			';',
			'#',
			'№',
			'_'
	);
	$url = str_replace($search, ' ', $str);
	$temp = '';
	while ($url !== $temp) {
		$temp = $url;
		$url = str_replace('  ', ' ', $url);
	}
	$url = mb_strtolower(str_replace(" ", "-", $url), "UTF-8");
	return $url;
}
?>