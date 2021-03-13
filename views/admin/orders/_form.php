<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\db\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orders_date')->textInput() ?>

    <?= $form->field($model, 'orders_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orders_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orders_addition')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'orders_status')->textInput() ?>

    <?= $form->field($model, 'orders_cookies_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orders_confirmation')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
