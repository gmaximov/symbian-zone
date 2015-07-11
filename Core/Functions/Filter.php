<?php
function isInt($var) {
	return filter_var($var, FILTER_VALIDATE_INT);
}
function isEmail($var) {
	return filter_var($var, FILTER_VALIDATE_EMAIL);
}
function isValidName($var, $lang = 'en', $min = '1', $max = '30') {
	if ($lang === 'en') {
		$preg = '#^[a-zA-Z0-9-_. ]{' . $min . ',' . $max . '}$#u';
	} elseif ($lang === 'ru') {
		$preg = '#^[ёЁа-яА-Я0-9-_. ]{' . $min . ',' . $max . '}$#u';
	}

	if (preg_match($preg, $var) === 1) {
		return true;
	}
	return false;
}
function stringSize($var, $min = 1, $max = 30) {
	if ((strlen($var) > $min) and (strlen($var) < $max)) {
		return true;
	}
	return false;
}
function isPositiveInt($var) {
	if ( filter_var($var, FILTER_VALIDATE_INT) ) {
		if ($var > 0) {
			return true;
		}
	}
	return false;
}