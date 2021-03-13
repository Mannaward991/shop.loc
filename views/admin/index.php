<?php
use yii\helpers\Html;

/** @var bool $isAdmin */
?>

<ul>
	<li><?= Html::a('Отзывы', ['reviews/index']) ?></li>
	<li><?= Html::a('Группы товаров', ['groups/index']) ?></li>
	<li><?= Html::a('Товары', ['goods/index']) ?></li>
	<li><?= Html::a('Заказы', ['orders/index']) ?></li>
</ul>