<?php
use app\models\db\Goods;
use app\models\db\Groups;
use yii\helpers\Url;
use yii\data\Pagination;
use yii\widgets\LinkPager;

/** @var Goods[] $goods */
/** @var int $id */
/** @var Pagination $pages */
/** @var Groups $group */
/** @var string $massage */
?>

<?php if($massage): ?>
	<br>
	<div class="massage">
		<h3><b><?= $massage ?></b></h3>
	</div>
<?php endif; ?>
<br>

<div class="page_main_name">
	<h1><small>Группа: </small><?= $group->groups_name ?></h1>
</div>

<?php /** @var Goods $good */
if(empty($goods)): ?>
	<div class="page_main_name">
		<h3>Скоро тут появятся подарки!</h3>
	</div>
<?php else: ?>
	<?php try{
		echo '<div style="text-align: center">';
		echo LinkPager::widget(['pagination' => $pages]);
		echo '</div>';
	}catch(Exception $e){
	} ?>
	<div style="padding: 0 20px" class="row">
		<?php foreach($goods as $good): ?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class="catalog_card">
						<img src="<?= Url::to(['@web/img/'.$good->goods_img]) ?>" alt="<?= $good->goods_img ?>">

						<h3><a href="<?= Url::to(['shop/product', 'id' => $good->goods_article]) ?>">
								<?= $good->goods_name ?></a></h3>
						<p><?= $good->goods_description ?></p>
					</div>
					<div class="caption">
						<div class="product_cost">
							<div class="new-price" >
								<span class="price_rouble"><b><?= $good->real_price['rouble'].',' ?></b></span>
								<span class="price_penny"><b><?= $good->real_price['penny_string'] ?></b></span>
								<span class="price_unit"><b>руб</b></span>
							</div>
						</div>

						<p style="text-align: center">
							<a href="<?= Url::to(['shop/product', 'id' => $good->goods_article]) ?>"
							   class="button_ns" role="button">Подробнее</a>
						</p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
<?php try{
	echo '<div style="text-align: center">';
	echo LinkPager::widget(['pagination' => $pages]);
	echo '</div>';
}catch(Exception $e){
} ?>
