<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\db\Groups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'groups_id')->textInput() ?>

    <?= $form->field($model, 'groups_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groups_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groups_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
