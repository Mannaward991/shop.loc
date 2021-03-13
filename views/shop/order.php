<?php
use yii\helpers\Html;

/** @var string $massage */
?>
<?php if($massage): ?>
	<br>
	<div class="massage">
		<h3><b><?= $massage ?></b></h3>
	</div>
<?php endif; ?>
<br>
<div class="massage">
	<?php Html::a('На главную', Yii::$app->homeUrl, ['class' => 'button_ns']) ?>
</div>
