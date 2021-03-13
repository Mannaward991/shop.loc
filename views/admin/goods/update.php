<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\db\Goods */

$this->title = 'Update Goods: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->goods_article, 'url' => ['view', 'id' => $model->goods_article]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="goods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
