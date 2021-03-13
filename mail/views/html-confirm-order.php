<?php

use app\models\db\Orders;
use app\models\Tools;
use \yii\helpers\Html;

/** @var Orders $order */
/** @var string $href */
?>

<h3>Подтверждение заказа на сайте <?= Yii::$app->params['siteName']?>.</h3>

<p>Вас приветствует администрация сайта <?= Yii::$app->params['siteName'] ?>.</p>
<p>Вы совершили заказ на нашем сайте:</p>
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

<p>Для подтверждения заказа перейдите по ссылке: <?= Html::a($href, $href) ?></p>

<p>Если вы не заказывали этот товар, то просто проигнорируйте это сообщение.</p>
