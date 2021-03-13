<?php

use app\models\db\Reviews;
use yii\helpers\Url;

/** @var Reviews $review */
?>

Подтверждение коментария на сайте <?= Yii::$app->params['siteName']?>

Вас приветствует администрация сайта <?= Yii::$app->params['siteName'] ?>.
Вы оставели отзыв на нашем сайте:

<?php if($review): ?>
Имя: <?= $review->reviews_name ?>
Отзыв: <?= $review->reviews_text ?>
<?php endif; ?>
<?php $href = Yii::$app->params['siteURL'].Url::to(['shop/reviews-confirm', 'href' => $review->reviews_confirmation]); ?>

Для подтверждения отзыва перейдите по ссылке: <?= $href ?>

Благодарим за интерес к нашему проэкту.
