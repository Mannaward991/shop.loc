<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\db\ReviewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'reviews_id') ?>

    <?= $form->field($model, 'reviews_name') ?>

    <?= $form->field($model, 'reviews_email') ?>

    <?= $form->field($model, 'reviews_text') ?>

    <?= $form->field($model, 'reviews_status') ?>

    <?php // echo $form->field($model, 'reviews_confirmation') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
