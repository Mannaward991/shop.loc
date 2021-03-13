<?php

namespace app\models;

use app\models\db\Price;

class Tools{

	/**
	 * @param Price[] $arr
	 * @return null|array
	 */
	public static function GetRealPrices($arr){
		if($arr === [])
			return null;
		$time = self::GetTimeSec();
		$last_time = 0;
		$real_price = 0;
		foreach($arr as $price){
			if($price->price_date > $time)
				continue;
			if($price->price_date > $last_time){
				$last_time = $price->price_date;
				$real_price = $price->price_price;
			}
		}
		if($real_price === 0)
			return null;
		return self::PriceToArray($real_price);
	}

	/**
	 * @param Price[] $arr
	 * @param int $deta
	 * @return array|null
	 */
	public static function GetTradePrice($arr, $deta){
		if($arr === [])
			return null;
		$last_time = 0;
		$trade_price = 0;
		foreach($arr as $price){
			if($price->price_date > $deta)
				continue;
			if($price->price_date > $last_time){
				$last_time = $price->price_date;
				$trade_price = $price->price_price;
			}
		}
		if($trade_price === 0)
			return null;
		return self::PriceToArray($trade_price);
	}

	/**
	 * [
	 *  'rouble' => (int)    целые рубли
	 * 	'penny'  => (int)    копейки
	 * 	'double' => (double) дробное пердставление цены
	 * 	'string' => (string) строковое представление цены
	 *  'penny_string' => (string) строковое представление копеек
	 * ]
	 *
	 * @param int $price
	 * @return array
	 */
	public static function PriceToArray($price){
		$real_price_arr = [
			'rouble' => (int)floor($price / 100.0),
			'penny' => $price % 100,
			'double' => $price / 100.0,
			'string' => (string)($price / 100.0),
		];
		if($real_price_arr['penny'] < 10)
			$real_price_arr['penny_string'] = '0'.(string)$real_price_arr['penny'];
		elseif($real_price_arr['penny'] === 0)
			$real_price_arr['penny_string'] = '00';
		else
			$real_price_arr['penny_string'] = (string)$real_price_arr['penny'];
		return $real_price_arr;
	}

	/**
	 * Вернет UNIX время в секундах.
	 * @return int
	 */
	public static function GetTimeSec(){
		return (int)microtime(true);
	}

	/**
	 * @return string
	 */
	public static function getRandomString(){
		return md5(Tools::GetTimeSec().$_SERVER["REQUEST_TIME_FLOAT"]);
	}

	/**
	 * @param $string
	 * @return string
	 */
	public static function getHash($string){
		return md5(md5($string));
	}

}