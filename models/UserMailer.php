<?php

namespace app\models;

use app\models\db\Orders;
use app\models\db\Reviews;
use Yii;
use yii\swiftmailer\Mailer;

class UserMailer extends Mailer{

	/**
	 * @param string $href
	 * @param Orders $order
	 * @return bool
	 */
	public static function SendConfirmOrder($href, $order){
		$mail = Yii::$app->mailer->compose([
			'html' => 'views/html-confirm-order',
			'text' => 'views/text-confirm-order',
		], ['href' => $href, 'order' => $order])
			->setFrom(Yii::$app->params['adminEmail'])
			->setTo($order->orders_email)
			->setSubject('Подтверждение заказа на сайте '.Yii::$app->params['siteName']);
		$result = $mail->send();
		return $result;
	}

	/**
	 * @param Orders $order
	 * @return bool
	 */
	public static function SendAdminOrder($order){
		$mail = Yii::$app->mailer->compose([
			'html' => 'views/html-admin-order',
			'text' => 'views/text-admin-order',
		], ['order' => $order])
			->setFrom(Yii::$app->params['adminEmail'])
			->setTo(Yii::$app->params['homeAdminEmail'])
			->setSubject('Получен новый заказ: '.Yii::$app->params['siteName']);
		$result = $mail->send();
		return $result;
	}

	/**
	 * @param Reviews $review
	 * @return bool
	 */
	public static function SendConfirmFeedback($review){
		$mail = Yii::$app->mailer->compose([
			'html' => 'views/html-confirm-feedback',
			'text' => 'views/text-confirm-feedback',
		], ['review' => $review])
			->setFrom(Yii::$app->params['adminEmail'])
			->setTo($review->reviews_email)
			->setSubject('Подтверждение коментария на сайте: '.Yii::$app->params['siteName']);
		$result = $mail->send();
		return $result;
	}

}