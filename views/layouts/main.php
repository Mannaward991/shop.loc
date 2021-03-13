<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="подарки крым, подарки Симферополь, подарочные наборы крым, подарочные наборы Симферополь, где купить подарок, что подарить, купить подарок в Симферополе">
	<?php if(Yii::$app->request->url == Yii::$app->homeUrl):?>
		<meta property="og:title" content="<?= Yii::$app->params['siteName'] ?>" />
		<meta property="og:type" content="image/jpeg" />
		<meta property="og:url" content="<?= Yii::$app->homeUrl ?>" />

		<meta property="og:image" content="<?= Url::to(['@web/img/main001.jpg']) ?>" />
		<meta property="og:image:secure_url" content="<?= Url::to(['@web/img/main001.jpg']) ?>" />
		<meta property="og:image:type" content="image/jpeg" />
		<meta property="og:image:width" content="700" />
		<meta property="og:image:height" content="420" />
		<meta property="og:image:alt" content="Логотип сайта: <?= Yii::$app->params['siteName'] ?>" />
	<?php endif; ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([//logo_min.png
        //'brandLabel' => Yii::$app->name,
	    'brandLabel' => Html::img('@web/img/image01.png', ['alt' => 'Наш логотип']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => [Yii::$app->homeUrl]],
	        ['label' => 'Каталог', 'url' => ['/shop/category']],
	        ['label' => 'Отзывы', 'url' => ['/shop/reviews']],
	        ['label' => 'Контакты', 'url' => ['/shop/about']],
	        ['label' => 'Корзина', 'url' => ['/shop/basket']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
	    <div class="container-in">
	        <?= Breadcrumbs::widget([
	            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	        ]) ?>
	        <?= Alert::widget() ?>
	        <?= $content ?>
	    </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
	    <div class="row" style="text-align: center">
		    <div class="col-md-8">
			    <p class="pull-left">&copy; <?= Yii::$app->params['siteName'] ?> <?= date('Y') ?></p>
		    </div>
		    <div class="col-md-4">
			    <div class="soc_href">
				    <a href="https://vk.com/nise_surprise" target="_blank" class="href_soc_net vk"/></a>
			        <a href="https://www.instagram.com/_nice__surprise_/" target="_blank" class="href_soc_net inst"/></a>
			    </div>
		    </div>
	    </div>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
