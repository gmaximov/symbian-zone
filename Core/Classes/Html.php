<?php
namespace Core\Classes;
class Html {
	// content - содержимое тега
	// value - содержимое поля value(если есть)
	
	public static $pretty_source = true;
	
	public static function label($content) {
	}
	public static function input($value) {
	}
	public static function tag($tag, $htmlOptions = array(), $content = false) {
		$html = '<' . $tag . self::renderAttributes($htmlOptions);
		if ($content === false) {
			return $html . '>';
		} else {
			return $html . '>' . $content . '</' . $tag . '>';
		}
	}
	public static function openTag($tag, $htmlOptions = array()) {
		return '<' . $tag . self::renderAttributes($htmlOptions) . '>';
	}
	public static function closeTag($tag) {
		return '</' . $tag . '>';
	}
	public static function renderAttributes($htmlOptions) {
		$specialAttributes = array(
				'autofocus' => 1,
				'autoplay' => 1,
				'async' => 1,
				'checked' => 1,
				'controls' => 1,
				'declare' => 1,
				'default' => 1,
				'defer' => 1,
				'disabled' => 1,
				'formnovalidate' => 1,
				'hidden' => 1,
				'ismap' => 1,
				'itemscope' => 1,
				'loop' => 1,
				'multiple' => 1,
				'muted' => 1,
				'nohref' => 1,
				'noresize' => 1,
				'novalidate' => 1,
				'open' => 1,
				'readonly' => 1,
				'required' => 1,
				'reversed' => 1,
				'scoped' => 1,
				'seamless' => 1,
				'selected' => 1,
				'typemustmatch' => 1
		);
		if ($htmlOptions === array()) {
			return '';
		}
		foreach ($htmlOptions as $name => $value) {
			if (isset($specialAttributes[$name])) {
				if (($value === false) && ($name === 'async')) {
					$html .= ' ' . $name . '="false"';
				} elseif ($value) {
					$html .= ' ' . $name;
				}
			} else {
				$html .= ' ' . $name . '="' . $value . '"';
			}
		}
		return $html;
	}
	public static function encode($text) {
		return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, "UTF-8");
	}
}