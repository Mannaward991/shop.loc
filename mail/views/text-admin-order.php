<?php

use app\models\db\Orders;
use app\models\Tools;

/** @var Orders $order */
?>

>Поступил новый заказ:<

Номер заказа: <?= $order->orders_id ?>

Дата создания заказа: <?= $order->orders_date ?>

Номер телефона: <?= $order->orders_phone ?>

Email адрес: <?= $order->orders_email ?>

Дополнительные данные: <?= $order->orders_addition ?>


Заказ:
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

