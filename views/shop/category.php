<?php
use app\models\db\Groups;
use yii\helpers\Url;

/** @var array $groups */
/** @var string $massage */
?>
<br>
<div class="page_main_name">
	<h1>Группы товаров</h1>
</div>

<div style="padding: 0 20px" class="row">
	<?php if($massage): ?>
		<br>
		<div class="massage">
			<h3><b><?= $massage ?></b></h3>
		</div>
	<?php endif; ?>
	<br>
	<?php
	if($groups):
		foreach($groups as $group):
			/** @var Groups $group */?>
			<div class="col-sm-6 col-md-6">
				<div class="thumbnail">
					<img src="<?= Url::to(['@web/img/'.$group->groups_img]) ?>"
					     alt="'.$group->groups_id.'" width="650" height="360">
					<div class="caption">
						<a style="text-align: center"
						   href="<?= Url::to(['shop/catalog', 'id' => $group->groups_id]) ?>">
							<h3><?= $group->groups_name ?></h3></a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
