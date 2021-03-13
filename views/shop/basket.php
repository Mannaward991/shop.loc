<?php

use app\models\form\AddProductForm;
use app\models\form\EditOrderForm;
use app\models\db\Orders;
use app\models\Tools;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var Orders $order */
/** @var EditOrderForm $order_model */
/** @var string $massage */
/** @var AddProductForm $order_change */

?>
<?php if($massage): ?>
	<br>
	<div class="massage">
		<h3><b><?= $massage ?></b></h3>
	</div>
<?php endif; ?>
<br>

<?php if($order): ?>
<div style="text-align: center" id="order_form_div">
	<div id="order_data_div">
		<div class="row">
			<div style="text-align: center" class="col-md-12">
				<h3>Информация о заказе:</h3>
			</div>
			<div class="col-md-12">
				<h4>Номер заказа: <?= $order->orders_id ?></h4>
			</div>
			<div class="col-md-12">
				<h4>Дата создания заказа: <?php if($order) echo date('d-m-Y  H:i', $order->orders_date) ?></h4>
			</div>
			<div class="col-md-12">
				<h4>Электронная почта: <?= $order->orders_email ?></h4>
			</div>
			<div class="col-md-12">
				<h4>Телефон: <?= $order->orders_phone ?></h4>
			</div>
			<div class="col-md-12">
				<h4>Дополнительные данные: <?= $order->orders_addition ?></h4>
			</div>
		</div>
	</div>

	<div class="small_hr_mk"></div>

	<div class="row">
		<div class="col-md-2"></div>
		<div style="text-align: center" class="col-md-8">
			<?php if($order->orders_status === 1): ?>
				<div id="order_edit_form">
				<?php
				$form = ActiveForm::begin([
				'id' => 'order_form',
				'layout' => 'default',
				'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-12 control-label'],
					],
				]);
				$form->action = Url::to(['shop/basket']); ?>

				<?= $form->field($order_model, 'email')
					->textInput(['autofocus' => true, 'class' => 'input_mk long_input_mk'])
					->label('Электронная почта:') ?>

				<?= $form->field($order_model, 'phone')
					->textInput(['class' => 'input_mk long_input_mk'])
					->label('Телефон:') ?>

				<?= $form->field($order_model, 'addition')
					->textarea(['class' => 'input_mk long_input_mk', 'rows' => 10, 'resize' => 'none'])
					->label('Дополнительные сведения:') ?>

				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="col-lg-offset-1 col-lg-11">
								<?= Html::submitButton('Сохранить', ['class' => 'button_ns']) ?>
							</div>
						</div>
					</div>
				</div>
				<?php ActiveForm::end(); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-md-2"></div>
	</div>

	<?php if($order->orders_status === 1): ?>
	<div class="small_hr_mk"></div>
	<?php endif; ?>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div id="order_content">
				<div class="row">
					<div class="col-md-12">
						<h3>Список товаров:</h3>
					</div>
				</div>

				<table class="table table-condensed">
					<tr style="text-align: center">
						<td>Название</td>
						<td>Цена</td>
						<td>Колличество</td>
					</tr>
					<?php
					if($order){
						$total_price = 0;
						foreach($order->ordersContents as $content){
							$total_price += ($content->ocArticle->trade_price['double'] * $content->oc_quantity);
							echo '<tr style="text-align: center"><td>'.$content->ocArticle->goods_name.'</td><td>'.
								$content->ocArticle->trade_price['rouble'].','.$content->ocArticle->trade_price['penny_string'].
								'</td><td>'.$content->oc_quantity.'</td>';
						}
						$total_price = Tools::PriceToArray((int)($total_price * 100));
						$price_to_string = $total_price['rouble'].','.$total_price['penny_string'].'Руб.';
					}
					?>
					<tr style="text-align: center">
						<td>Всего:</td>
						<td></td>
						<td><?= $price_to_string ?></td>
					</tr>
				</table>

				<div class="row">
					<div class="col-md-12">
						<h3>Изменить заказ:</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<?php if(($order->orders_status === 1) || ($order->orders_status === 2)): ?>
							<?php
							$form = ActiveForm::begin([
								'id' => 'change_order_form',
								'options' => [
									'class' => 'form-inline',
								],
								'layout' => 'default',
								'fieldConfig' => [
									'template' => "{label}\n{input}\n{error}",
									'labelOptions' => ['class' => 'col-lg-12 control-label'],
								],
							]);
							$form->action = Url::to(['shop/basket']);
							$form->layout = 'inline';

							$arr = [];
							foreach($order->ordersContents as $content){
								$arr[$content->oc_article] = $content->ocArticle->goods_name;
							} ?>

							<div class="form-group">
								<?= $form->field($order_change, 'id')
									->dropdownList($arr, ['class' => 'input_mk'])->label(false) ?>
							</div>
							<div class="form-group">
								<?= Html::buttonInput('-', ['class' => 'button_ns change_order_form_minus']) ?>
							</div>
							<div class="form-group">
								<?= $form->field($order_change, 'quantity')
									->textInput(['maxlength' => 2, 'size' => 2, 'value' => 0, 'class' => 'input_mk'])
									->label(false) ?>
							</div>
							<div class="form-group">
								<?= Html::buttonInput('+', ['class' => 'button_ns change_order_form_plus']) ?>
							</div>
							<div class="form-group">
								<?= Html::submitInput('Сохранить', [
									'id' => 'change_order_form_submit',
									'class' => 'button_ns',
									'name' => 'login-button',
								]) ?>
							</div>

							<?php ActiveForm::end() ?>
						<?php endif; ?>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="small_hr_mk"></div>

	<div style="text-align: center" class="row">
		<div class="col-md-5"></div>
		<div class="col-md-7">
			<div id="order_main_but_div">
			<?= Html::a('Отменить заказ', ['shop/remove-order'],
				['class' => 'button_ns big_button_ns']) ?>

			<?php $img = Html::img('img/order_b.png', [
				'width' => '40ph',
				'height' => '40px',
			]);
			if($order->orders_status != 1)
				echo Html::a('<b>Заказать </b>'.$img, ['shop/process-order'],
					['class' => 'button_ns big_button_ns'])?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
