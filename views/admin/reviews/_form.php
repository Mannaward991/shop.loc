<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\db\Reviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reviews_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reviews_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reviews_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reviews_status')->textInput() ?>

    <?= $form->field($model, 'reviews_confirmation')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
