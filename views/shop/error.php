<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
	    Произошла ошибка когда веб-сервер обрабатывал ваш запрос.
    </p>

	<img style="border-radius: 7px" src="<?= Url::to(['@web/img/error404.jpg']) ?>">

</div>
