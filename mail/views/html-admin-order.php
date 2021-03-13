<?php

use app\models\db\Orders;
use app\models\Tools;

/** @var Orders $order */
?>

<h3>Поступил новый заказ:</h3>

<p>Номер заказа: <?= $order->orders_id ?></p>

<p>Дата создания заказа: <?= $order->orders_date ?></p>

<p>Номер телефона: <?= $order->orders_phone ?></p>

<p>Email адрес: <?= $order->orders_email ?></p>

<p>Дополнительные данные: <?= $order->orders_addition ?></p>


<p>Заказ:</p>
<table class="">
	<tr style="text-align: center">
		<td>Название</td>
		<td>Цена</td>
		<td>Колличество</td>
	</tr>
	<?php
	if($order){
		$total_price = 0;
		foreach($order->ordersContents as $content){
			$total_price += ($content->ocArticle->trade_price['double'] * $content->oc_quantity);
			echo '<tr style="text-align: center"><td>'.$content->ocArticle->goods_name.'</td><td>'.
				$content->ocArticle->trade_price['rouble'].','.$content->ocArticle->trade_price['penny_string'].
				'</td><td>'.$content->oc_quantity.'</td>';
		}
		$total_price = Tools::PriceToArray((int)($total_price * 100));
		$price_to_string = $total_price['rouble'].','.$total_price['penny_string'].'Руб.';
	}
	?>
	<tr style="text-align: center">
		<td>Всего:</td>
		<td></td>
		<td><?= $price_to_string ?></td>
	</tr>
</table>
