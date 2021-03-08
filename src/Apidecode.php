<?php
namespace api\decode;
class Apidecode {
	/** @var string SECRET_KEY */
	// const SECRET_KEY = 'Lsbb2015!s@Os-=23+';

	/** @var bool PARAM_EXP_AUTH */
	const PARAM_EXP_AUTH = false;

	/** @var int PARAM_EXP_LENGTH */
	const PARAM_EXP_LENGTH = 60000;

	/** @var array $params */
	static $params = [];
	/**
	 * @param null $data
	 * @return string
	 */
	public static function encode() {
		$time = time();
		$digest = self::digest([env('API_PASSWORD'), $time]);
		return array('sign' => $digest, 'time' => $time);
	}
	/**
	 * sign timestamp
	 */
	public static function decode($sign, $timestamp) {
		$timestamp = strlen($timestamp) > 13 ? substr($timestamp, 0, 13) : $timestamp;
		if ($timestamp + self::PARAM_EXP_LENGTH < time() && self::PARAM_EXP_AUTH === true) {
			return false;
		}
		$digest = self::digest([env('API_PASSWORD'), $timestamp]);
		if ($digest != $sign) {
			return false;
		}
		return true;
	}
	/**
	 * @param array $params
	 * @return string
	 */
	private static function digest($params = []) {
		sort($params, SORT_STRING);
		//dd($params);
		return base64_encode(md5(implode($params)));
	}
}
