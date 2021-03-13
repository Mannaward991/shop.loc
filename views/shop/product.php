<?php
use app\models\db\Goods;
use app\models\form\AddProductForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

/** @var int $id */
/** @var Goods $product */
/** @var AddProductForm $add_form */
/** @var string $massage */
?>
<?php if($massage): ?>
<br>
<div class="massage">
	<h3><b><?= $massage ?></b></h3>
</div>
<?php endif; ?>
<br>

<div class="row">
	<div class="col-md-6">
		<div class="sld">
			<div class="main_img">
				<img src="<?= Url::to(['@web/img/'.$product->goods_img]) ?>"
				     alt="<?= $product->goods_img ?>" id="sld_main_img" class="img-thumbnail">
			</div>
			<div class="small_imgs">
				<div class="row">
					<?php if($product->goodsImgs): ?>
						<div class="col-md-4">
							<img src="<?= Url::to(['@web/img/'.$product->goods_img]) ?>"
							     alt="<?= $product->goods_img ?>" class="img-thumbnail sld_small_imgs">
						</div>
					<?php foreach($product->goodsImgs as $goodsImg): ?>
						<div class="col-md-4">
							<img src="<?= Url::to(['@web/img/'.$goodsImg->gi_href]) ?>"
							     alt="<?= $goodsImg->gi_href ?>" class="img-thumbnail sld_small_imgs">
						</div>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card_info">
			<h2><?= $product->goods_name ?></h2>
			<h4><?= $product->goods_description ?></h4>
			<h3>Артикул: <?= $product->goods_article ?></h3>
			<h3>Группа: <a href="
			<?= Url::to(['shop/catalog', 'id' => $product->goodsGroups->groups_id]) ?>
			"><?= $product->goodsGroups->groups_name ?></a></h3>

			<div class="product_cost">
				<div class="new-price" >
					<span class="price_rouble"><?= $product->real_price['rouble'].',' ?></span>
					<span class="price_penny"><?= $product->real_price['penny_string'] ?></span>
					<span class="price_unit">руб</span>
				</div>
			</div>

			<div class="add_product_div">
				<?php $form = ActiveForm::begin([
					'id' => 'add_product_form',
					'options' => [
						'class' => 'form-inline',
					],
					'fieldConfig' => [
						'template' => "{label}\n{input}\n{error}",
						'labelOptions' => ['class' => 'col-lg-1 control-label'],
					],
				]);
				$form->action = Url::to(['shop/product']);
				//$form->fieldClass = $form->fieldClass.' form-inline';
				$form->layout = 'inline';
				?>

				<?= $form->field($add_form, 'id')
					->hiddenInput(['value' => $product->goods_article])
					->label(false) ?>
				<div class="form-group">
				<?= Html::buttonInput('-', ['class' => 'button_ns add_product_form_minus']) ?>
				</div>
				<?= $form->field($add_form, 'quantity')
					->textInput(['maxlength' => 2, 'size' => 2, 'value' => 1, 'class' => 'input_mk'])
					->label(false) ?>
				<div class="form-group">
				<?= Html::buttonInput('+', ['class' => 'button_ns add_product_form_plus']) ?>
				</div>

				<div class="form-group">
					<?= Html::submitInput('В корзину', [
						'id' => 'add_product_form_submit',
						'class' => 'button_ns',
						'name' => 'login-button',
					]) ?>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
	<div class="col-md-12">

	</div>
</div>
