<?php

use app\models\db\Reviews;
use \yii\helpers\Html;
use yii\helpers\Url;

/** @var Reviews $review */
?>

<h3>Подтверждение коментария на сайте .<?= Yii::$app->params['siteName']?></h3>

<p>Вас приветствует администрация сайта <?= Yii::$app->params['siteName'] ?>.</p>
<p>Вы оставели отзыв на нашем сайте:</p>

<?php if($review): ?>
	<div style="text-align: center">
		<div style="text-align: left"><h2><?= $review->reviews_name ?></h2></div>
		<div><h3><?= $review->reviews_text ?></h3></div>
	</div>
<?php endif; ?>

<?php $href = Yii::$app->params['siteURL'].Url::to(['shop/reviews-confirm', 'href' => $review->reviews_confirmation]); ?>
<p>Для подтверждения отзыва перейдите по ссылке: <?= Html::a($href, $href) ?></p>

<p>Благодарим за интерес к нашему проэкту.</p>
