<?php

use app\models\form\AddReviewForm;
use app\models\db\Reviews;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\Html;

/** @var array $reviews */
/** @var string $massage */
/** @var Pagination $pages */
/** @var AddReviewForm $reviewsForm */

?>
<?php if($massage): ?>
	<br>
	<div class="massage">
		<h3><b><?= $massage ?></b></h3>
	</div>
<?php endif; ?>
<br>

<div class="page_main_name">
	<h1>Отзывы:</h1>
</div>

<?php if($reviews): ?>
<div style="text-align: center" class="row revievs_div">
	<?php try{
		echo '<div style="text-align: center">';
		echo LinkPager::widget(['pagination' => $pages]);
		echo '</div>';
	}catch(Exception $e){
	} ?>
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<?php /** @var Reviews $review */
	foreach($reviews as $review): ?>
	<div class="reviews_div">
		<div class="reviews_name"><h2><?= $review->reviews_name ?></h2></div>
		<div class="mini_hr_mk"></div>
		<div class="reviews_text"><h3><?= $review->reviews_text ?></h3></div>
	</div>
	<?php endforeach; ?>
	</div>
	<div class="col-md-1"></div>
	<?php try{
		echo '<div style="text-align: center">';
		echo LinkPager::widget(['pagination' => $pages]);
		echo '</div>';
	}catch(Exception $e){
	} ?>
</div>
<?php endif; ?>
<div class="small_hr_mk"></div>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="add_revievs">
			<h2 style="text-align: center">Добавить отзыв</h2>
	<?php
	$form = ActiveForm::begin([
		'id' => 'reviews_form',
		'layout' => 'default',
		'fieldConfig' => [
			'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
			'labelOptions' => ['class' => 'col-lg-12 control-label'],
		],
	]);
	$form->action = Url::to(['shop/reviews']); ?>

	<?= $form->field($reviewsForm, 'reviews_name')
		->textInput(['value' => 'Гость', 'class' => 'input_mk long_input_mk'])
		->label('Имя:') ?>

	<?= $form->field($reviewsForm, 'reviews_email')
		->textInput(['class' => 'input_mk long_input_mk'])
		->label('Электронная почта:') ?>

	<?= $form->field($reviewsForm, 'reviews_text')
		->textarea(['rows' => 10, 'resize' => 'none', 'class' => 'input_mk long_input_mk'])
		->label('Текст сообщения:') ?>

	<div class="row">
		<div class="col-md-8"></div>
		<div class="col-md-4">
			<div class="form-group">
				<div class="col-lg-offset-1 col-lg-11">
					<?= Html::submitButton('Отправить', ['class' => 'button_ns']) ?>
				</div>
			</div>
		</div>
	</div>
	<?php ActiveForm::end(); ?>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
