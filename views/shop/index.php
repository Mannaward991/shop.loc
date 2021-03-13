<?php
use app\models\db\Goods;
use yii\helpers\Url;

/** @var Goods[] $goods */
?>
<br>
<div style="padding-top: 10px; padding-bottom: 10px" class="jumbotron">
	<div class="main_page_box">
		<img style="width: 100%; height: 100%"
		     src="<?= Url::to(['@web/img/main001.jpg']) ?>" alt="main001.png" class="img-rounded">
	</div>
</div>

<div class="small_hr_mk"></div>

<div style="padding-top: 10px; padding-bottom: 10px" class="jumbotron">
	<div class="main_page_box">
		<p>Традиция дарить подарки стара как мир. Многие люди любят делать подарки. А некоторые признаются, что дарить им даже приятнее, чем получать. Оказывается, это не только приятно, но и полезно с психологической точки зрения.</p>
		<p>Самооценка. Добрые дела в целом и подарки в частности положительно влияют на нашу самооценку. Одаривая кого-то, мы кажемся себе лучше и сильнее. Это поднимает настроение и вообще позитивно влияет на наши жизненные успехи. Так что, вручая подарки и помогая другим, мы делаем лучше и самим себе.</p>
		<p>Самовыражение. Выбор интересного и необычного подарка – задачка очень непростая. И как же приятно бывает найти, наконец, идеальное решение! Подарки, сделанные от души, много говорит о дарителе, так что они – один из способов самовыражения.</p>
		<p>Вера в чудо. В детстве мы верили в чудеса. Но с возрастом относиться к нему так же по-детски все сложнее. Один из лучших способов снова поверить в чудо – стать его автором. Как говорится, жизнь человека делится на три этапа: сначала он верит в Деда Мороза, потом – не верит, а потом он сам – Дед Мороз. Даря подарки окружающим, мы сами становимся зимними волшебниками, принося чудо и сказку в жизни людей.</p>
		<p>Ну и, конечно, самое главное – видеть выражение счастья и радости на лицах близких людей. Думаю, для многих это и есть – самый ценный новогодний подарок.</p>

		<h2>А вы любите дарить подарки?</h2>
	</div>
</div>

<div class="small_hr_mk"></div>

<div style="padding-top: 10px; padding-bottom: 10px" class="jumbotron">
<?php if($goods): ?>
	<div class="main_page_box">
		<h2 style="text-align: center">Топ продаваемых товаров.</h2>
		<br>
		<div class="row">
		<?php foreach($goods as $good): ?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class="catalog_card">
					<img src="<?= Url::to(['@web/img/'.$good->goods_img]) ?>" alt="<?= $good->goods_img ?>">
						<h3><a href="<?= Url::to(['shop/product', 'id' => $good->goods_article]) ?>">
								<?= $good->goods_name ?></a></h3>
						<?= $good->goods_description ?>
					</div>
					<div class="caption">
						<div class="product_cost">
							<div class="new-price" >
								<span class="price_rouble"><?= $good->real_price['rouble'] ?></span><span class="price_penny">,
									<?= $good->real_price['penny_string'] ?></span>
								<span class="price_unit">руб</span>
							</div>
						</div>

						<p>
							<a href="<?= Url::to(['shop/product', 'id' => $good->goods_article]) ?>"
							   class="button_ns" role="button">Подробнее</a>
						</p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
</div>

<div class="small_hr_mk"></div>

<div style="padding-top: 10px; padding-bottom: 10px" class="jumbotron">
	<div class="main_page_box">
		<h2 style="text-align: center">Доставка</h2>
		<div class="mini_hr_mk"></div>
		<h3>Возможны следующие варианты доставки:</h3>
		<h3>Самовывоз - забрать подарок можно в ТРЦ Меганом</h3>
		<h3>Курьером по Симферополю 150р</h3>
		<h3>Доставка по РФ - ПЭК, почта России</h3>
	</div>
</div>

<div class="small_hr_mk"></div>

<div style="padding-top: 10px; padding-bottom: 10px" class="jumbotron">
	<div class="main_page_box">
		<h2 style="text-align: center">Наши приймушества:</h2>
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="all_plus">
						<img src="<?= Url::to(['@web/img/advantage001.png']) ?>" alt="Экономия времени">
						<h4>Экономия времени</h4>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="all_plus">
						<img src="<?= Url::to(['@web/img/advantage002.png']) ?>" alt="Широкий выбор">
						<h4>Широкий выбор</h4>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="all_plus">
						<img src="<?= Url::to(['@web/img/advantage003.png']) ?>" alt="Индивидуальный подход к клиентам">
						<h4>Индивидуальный подход к клиентам</h4>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="all_plus">
						<img src="<?= Url::to(['@web/img/advantage004.png']) ?>" alt="Качество и стиль">
						<h4>Качество и стиль</h4>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="all_plus">
						<img src="<?= Url::to(['@web/img/advantage005.png']) ?>" alt="Неожиданный подарок для близких">
						<h4>Неожиданный подарок для близких</h4>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="all_plus">
						<img src="<?= Url::to(['@web/img/advantage006.png']) ?>" alt="Хорошее настроение для всех!">
						<h4>Хорошее настроение для всех!</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>