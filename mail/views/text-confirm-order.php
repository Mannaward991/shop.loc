<?php

use app\models\db\Orders;
use app\models\Tools;

/** @var Orders $order */
/** @var string $href */
?>

Подтверждение заказа на сайте .<?= Yii::$app->params['siteName']?>

Вас приветствует администрация сайта <?= Yii::$app->params['siteName'] ?>.
Вы совершили заказ на нашем сайте:

<?php
if($order){
	$total_price = 0;
	foreach($order->ordersContents as $content){
		$total_price += ($content->ocArticle->trade_price['double'] * $content->oc_quantity);
		echo 'Название: '.$content->ocArticle->goods_name.'Цена: '.
			$content->ocArticle->trade_price['rouble'].','.$content->ocArticle->trade_price['penny_string'].
			'Колличество: '.$content->oc_quantity.'.\r\n';
	}
	$total_price = Tools::PriceToArray((int)($total_price * 100));
	$price_to_string = $total_price['rouble'].','.$total_price['penny_string'].'Руб.';
}
?>
Сумма заказа: <?= $price_to_string ?>

Для подтверждения заказа перейдите по ссылке: <?= $href ?>

Если вы не заказывали этот товар, то просто проигнорируйте это сообщение.
