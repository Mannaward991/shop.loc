<?php

return [
	//Электронная почта администратора.
	'adminEmail' => 'admin@example.com',
	//Адрес для отправки заказов.
	'homeAdminEmail' => 'admin@example.com',
	//Имя сайта.
	'siteName' => 'Nice Surprise',
	//URL сайта
	'siteURL' => 'http://mk.loc',
	//Колличество товаров на странице.
	'catalogPageSize' => 6,
	//Колличество отзывов на странице.
	'reviewsPageSize' => 2,
	//Способ сортировки товара. ASC - старые вверху, DESC - новые вверху.
	'sortingGoods' => 'DESC',
	//Тайм-аут cookies в секундах.
	'cookiesTimeout' => 60 * 60 * 24,
	//Список топ артикулов.
	'topGoods' => [
		100013,
		100028,
		100023,
	],
	//Число заказов в день с одной почты.
	'numberOfOrdersDay' => 5,

	//Админка
	'adminLogin' => 'admin',
	'adminPass' => 'admin',
];
