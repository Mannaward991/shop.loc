<?php

namespace app\controllers;

use Yii;
use app\models\UserMailer;
use app\models\Tools;
use app\models\form\AddReviewForm;
use app\models\form\ChangeOrderForm;
use app\models\form\EditOrderForm;
use app\models\form\AddProductForm;
use app\models\db\Orders;
use app\models\db\Reviews;
use app\models\db\OrdersContent;
use app\models\db\Goods;
use app\models\db\Groups;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\NotFoundHttpException;

class ShopController extends Controller{

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	//
	private $requestCookies;
	//
	private $responseCookies;
	//Id по которому определяется сессия клиента.
	private $userCookiesId;
	//Форматированная строка сообщений пользователю.
	private $massage = '';

	/**
	 * @param $action
	 * @return bool
	 * @throws \yii\web\BadRequestHttpException
	 */
	public function beforeAction($action){
		//Установка названия сайта
		Yii::$app->name = Yii::$app->params['siteName'];
		//Запуск сессий.
		//Yii::$app->session->open();
		$this->startCookies();
		return parent::beforeAction($action);
	}

	//Настройка cookies.
	private function startCookies(){
		$this->requestCookies = Yii::$app->request->cookies;
		$this->responseCookies = Yii::$app->response->cookies;
		if (isset($this->requestCookies['userCookiesId'])) {
			$this->userCookiesId = $this->requestCookies['userCookiesId']->value;
		}else{
			$this->userCookiesId = Tools::getRandomString();
		}
		$this->responseCookies->add(new Cookie([
			'name' => 'userCookiesId',
			'value' => $this->userCookiesId,
			'expire' => Tools::GetTimeSec() + Yii::$app->params['cookiesTimeout'],
		]));
	}

	public function actionIndex(){
		$goods = Goods::find()
			->with('prices')
			->where(['goods_article' => Yii::$app->params['topGoods']])
			->all();
		foreach($goods as $good){
			$good->real_price = Tools::GetRealPrices($good->prices);
		}
		return $this->render('index', compact('goods'));
	}

	public function actionCategory(){
		$groups = Groups::find()
			->where(['!=', 'groups_status', 2])
			->all();
		if(!$groups){
			$this->addMassage('Ошибка базы данных.');
		}
		return $this->render('category', ['groups' => $groups, 'massage' => $this->massage]);
	}

	public function actionCatalog(){
		$id = Yii::$app->request->get('id');
		$page = Yii::$app->request->get('page');
		//Группа товаров.
		$group = Groups::find()->where(['groups_id' => $id])->one();
		//Список товаров.
		$query = Goods::find()
			->with('prices')
			->where(['goods_groups' => $id])
			->andWhere(['goods_status' => 100])
			->orderBy('goods_article '.Yii::$app->params['sortingGoods']);
		$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => Yii::$app->params['catalogPageSize'],
			'pageSizeParam' => false, 'forcePageParam' => false]);
		$goods = $query->offset($pages->offset)->limit($pages->limit)->all();
		foreach($goods as $good){
			$good->real_price = Tools::GetRealPrices($good->prices);
		}
		return $this->render('catalog', compact('id', 'page', 'goods', 'pages', 'group', 'massage'));
	}

	/**
	 * @return string
	 * @throws NotFoundHttpException
	 */
	public function actionProduct(){
		$id = null;
		if(Yii::$app->request->post('AddProductForm')){
			$productForm = new AddProductForm();
			if ($productForm->load(Yii::$app->request->post())) {
				$post = Yii::$app->request->post('AddProductForm');
				$id = $post['id'];

				//Прверяем, создан ли заказ.
				$order = Orders::find()
					->where(['orders_cookies_id' => $this->userCookiesId])
					->andWhere(['orders_status' => [1, 2]])
					->one();
				if($order === null){
					//Заказ еще не создан.
					$order = new Orders();
					$order->orders_cookies_id = $this->userCookiesId;
					$order->orders_date = Tools::GetTimeSec();
					$order->save();
					//TODO лишний запрос.
					$order = Orders::find()
						->where(['orders_cookies_id' => $this->userCookiesId])
						->andWhere(['orders_status' => 1])
						->one();
				}
				//Заказ создан.
				if(!$order){
					$this->addMassage('Не удалось добавить товар в корзину. Ошибка базы данных.');
				}else{
					$order_content = OrdersContent::find()
						->where(['oc_id' => $order->orders_id])
						->andWhere(['oc_article' => $productForm->id])
						->one();
					if($order_content != null){
						//Товар уже есть в карзине.
						$order_content->oc_quantity += $productForm->quantity;
						$saved = $order_content->save();
					}else{
						//добавляем новый товар.
						$order_content = new OrdersContent();
						$order_content->oc_id = $order->orders_id;
						$order_content->oc_article = $productForm->id;
						$order_content->oc_quantity = $productForm->quantity;
						$saved = $order_content->save();
					}
					if($saved)
						$this->addMassage('Товар добавлен.');
					else
						$this->addMassage('Не удалось добавить товар в корзину. Ошибка базы данных.');
				}
			}else{
				foreach ($productForm->getErrors() as $key => $value) {
					$this->addMassage($key.': '.$value[0]);
				}
			}
		}
		if(!Yii::$app->request->get('id')){
			if(!$id){
				throw new NotFoundHttpException();
			}
		}
		if(!$id)
			$id = Yii::$app->request->get('id');
		$product = Goods::find()
			->with(['goodsGroups', 'prices', 'goodsImgs'])
			->where(['goods_article' => $id])
			->andWhere(['goods_status' => 100])
			->one();
		if(!$product){
			throw new NotFoundHttpException();
		}
		$product->real_price = Tools::GetRealPrices($product->prices);
		$add_form = new AddProductForm();
		return $this->render('product', ['id' => $id, 'product' => $product,
			'add_form' => $add_form, 'massage' => $this->massage]);
	}

	public function actionAbout(){
		return $this->render('about');
	}

	public function actionReviews(){
		if(Yii::$app->request->post('AddReviewForm')){
			$reviewForm = new AddReviewForm();
			if($reviewForm->load(Yii::$app->request->post()) && $reviewForm->validate()){
				$review = new Reviews();
				$review->reviews_name = $reviewForm->reviews_name;
				$review->reviews_email = $reviewForm->reviews_email;
				$review->reviews_text = $reviewForm->reviews_text;
				$review->reviews_confirmation = Tools::getRandomString();
				if($review->save()){
					if(UserMailer::SendConfirmFeedback($review)){
						$this->addMassage("Вам на почту $review->reviews_email было отправлено письмо для подтверждения отзыва.");
					}else{
						$this->addMassage('Ошибка при отправки почты.');
					}
				}else{
					$this->addMassage('Ошибка базы данных.');
				}
			}
		}
		$query = Reviews::find()
			->where(['reviews_status' => 2])
			->orderBy('reviews_id DESC');
		$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => Yii::$app->params['reviewsPageSize'],
			'pageSizeParam' => false, 'forcePageParam' => false]);
		$reviews = $query->offset($pages->offset)->limit($pages->limit)->all();
		$reviewsForm = new AddReviewForm();
		return $this->render('reviews', ['reviews' => $reviews, 'pages' => $pages,
			'massage' => $this->massage, 'reviewsForm' => $reviewsForm]);
	}

	/**
	 * @return string
	 * @throws NotFoundHttpException
	 */
	public function actionReviewsConfirm(){
		if(Yii::$app->request->get('href')){
			$review = Reviews::find()
				->where(['reviews_status' => 1])
				->andWhere(['reviews_confirmation' => Yii::$app->request->get('href')])
				->one();
			if($review){
				$review->reviews_status = 2;
				$review->reviews_confirmation = '1';
				if($review->save()){
					$this->addMassage('Отзыв добавлен');
				}else{
					$this->addMassage('Ошибка базы данных');
				}
			}else{
				throw new NotFoundHttpException();
			}
		}else{
			throw new NotFoundHttpException();
		}
		return $this->render('order', ['massage' => $this->massage]);
	}

	/**
	 * @return string
	 * @throws \Throwable
	 * @throws \yii\db\StaleObjectException
	 */
	public function actionBasket(){
		//Обновление данных заказа.
		if(Yii::$app->request->post('EditOrderForm')){
			$orderForm = new EditOrderForm();
			if($orderForm->load(Yii::$app->request->post()) && $orderForm->validate()){
				//Данные добавлены.
				$order = Orders::find()
					->where(['orders_cookies_id' =>$this->userCookiesId])
					->andWhere(['orders_status' => 1])
					->one();
				if($order){
					//Заказ существует.
					$order->orders_email = $orderForm->email;
					$order->orders_phone = $orderForm->phone;
					$order->orders_addition = $orderForm->addition;
					$order->orders_status = 2;
					if($order->save()){
						$this->addMassage('Данные заказа обновлены.');
					}else{
						$this->addMassage('Ошибка базы данных.');
					}
				}else{
					//Заказ не существует.
					$this->addMassage('Ошибка обновления заказа.');
				}
			}else{
				//Вывод ошибок.
				foreach ($orderForm->getErrors() as $key => $value) {
					$this->addMassage($key.': '.$value[0]);
				}
			}
		}
		if(Yii::$app->request->post('ChangeOrderForm')){
			$order_change = new ChangeOrderForm();
			if($order_change->load(Yii::$app->request->post()) && $order_change->validate()){
				//Данные добавлены.
				$order = Orders::find()
					->with(['ordersContents'])
					->where(['orders_cookies_id' =>$this->userCookiesId])
					->andWhere(['orders_status' => [1, 2]])
					->one();
				if($order){
					/** @var OrdersContent $content */
					foreach($order->ordersContents as $content){
						if($content->oc_article == $order_change->id){
							$content->oc_quantity += $order_change->quantity;
							if($content->oc_quantity < 0){
								$content->oc_quantity = 0;
							}
							if($content->oc_quantity === 0){
								$result = $content->delete();
							}else{
								$result = $content->save();
							}
							if($result){
								$this->addMassage('Данные обновлены.');
							}else{
								$this->addMassage('Ошибка базы данных.');
							}
						}
					}
				}else{
					//Заказ не существует.
					$this->addMassage('Ошибка обновления заказа.');
				}
			}else{
				//Вывод ошибок.
				foreach ($orderForm->getErrors() as $key => $value) {
					$this->addMassage($key.': '.$value[0]);
				}
			}
		}
		//Вывод заказа.
		$order = Orders::find()
			->with(['ordersContents', 'ordersContents.ocArticle', 'ordersContents.ocArticle.prices'])
			->where(['orders_cookies_id' =>$this->userCookiesId])
			->andWhere(['orders_status' => [1, 2]])
			->one();
		if($order != null){
			foreach($order->ordersContents as $content){
				$content->ocArticle->trade_price =
					Tools::GetTradePrice($content->ocArticle->prices, $order->orders_date);
			}
		}else{
			$this->addMassage('Вы еще не добавляли ничего в корзину.');
		}
		//Создание модели редактирования заказа.
		$order_model = new EditOrderForm();
		$order_change = new ChangeOrderForm();
		return $this->render('basket', [
			'order' => $order,
			'order_model' => $order_model,
			'massage' => $this->massage,
			'order_change' => $order_change,
		]);
	}

	public function actionRemoveOrder(){
		$order = Orders::find()
			->where(['orders_cookies_id' => $this->userCookiesId])
			->andWhere(['orders_status' => [1, 2]])
			->one();
		if($order){
			$order->orders_status = 9;
			$order->save();
		}
		$this->responseCookies = Yii::$app->response->cookies;
		$this->userCookiesId = Tools::getRandomString();
		$this->responseCookies->add(new Cookie([
			'name' => 'userCookiesId',
			'value' => $this->userCookiesId,
			'expire' => Tools::GetTimeSec() + Yii::$app->params['cookiesTimeout'],
		]));
		return $this->goHome();
	}

	public function actionProcessOrder(){
		$order = Orders::find()
			->with(['ordersContents', 'ordersContents.ocArticle', 'ordersContents.ocArticle.prices'])
			->where(['orders_cookies_id' =>$this->userCookiesId])
			->andWhere(['orders_status' => [1, 2]])
			->one();
		if($order != null){
			foreach($order->ordersContents as $content){
				$content->ocArticle->trade_price =
					Tools::GetTradePrice($content->ocArticle->prices, $order->orders_date);
			}
		}else{
			$this->addMassage('Вы еще не добавляли ничего в корзину.');
			return $this->render('order', ['massage' => $this->massage]);
		}
		if($order->orders_status === 1){
			$this->addMassage('Вы не заполнили форму заказа.');
			//return Yii::$app->runAction('shop/basket');
			return $this->render('order', ['massage' => $this->massage]);
		}
		if(!$order->ordersContents){
			$this->addMassage('В корзине нет не одного товара.');
			//return Yii::$app->runAction('shop/basket');
			return $this->render('order', ['massage' => $this->massage]);
		}
		if($order->orders_confirmation){
			$this->addMassage('Вам уже отправлено письмо для подтверждения заказа.');
			//return Yii::$app->runAction('shop/basket');
			return $this->render('order', ['massage' => $this->massage]);
		}
		$minTime = Tools::GetTimeSec() - (60 * 60 * 24);
		$orderToDay = Orders::find()->where(['orders_email' => $order->orders_email])
			->andWhere(['not in', 'orders_status', [1, 2, 9]])
			->andWhere(['>', 'orders_date', $minTime])
			->count();
		if($orderToDay >= Yii::$app->params['numberOfOrdersDay']){
			$this->addMassage('Максимальное число заказов в день '.Yii::$app->params['numberOfOrdersDay']);
			return $this->render('order', ['massage' => $this->massage]);
		}
		$confirm_str = Tools::getRandomString();
		$order->orders_confirmation = $confirm_str;
		if(!$order->save()){
			$this->addMassage('Ошибка базы данных.');
			return $this->render('order', ['massage' => $this->massage]);
		}else{
			$href = Yii::$app->params['siteURL'].Url::to(['shop/confirmation', 'href' => $confirm_str]);
			/** @var Orders $order */
			if(UserMailer::SendConfirmOrder($href, $order)){
				$this->addMassage("Вам на почту $order->orders_email было отправлено письмо для подтверждения заказа.");
			}else{
				$order->orders_confirmation = null;
				$order->save();
				$this->addMassage('Ошибка при отправки почты.');
			}
		}
		return $this->render('order', ['massage' => $this->massage]);
	}

	/**
	 * @return string
	 * @throws NotFoundHttpException
	 */
	public function actionConfirmation(){
		if(Yii::$app->request->get('href')){
			$orders_confirmation = Yii::$app->request->get('href');
			$order = Orders::find()
				->with(['ordersContents', 'ordersContents.ocArticle', 'ordersContents.ocArticle.prices'])
				->where(['orders_confirmation' => $orders_confirmation])
				->andWhere(['orders_status' => 2])
				->one();
			if($order != null){
				foreach($order->ordersContents as $content){
					$content->ocArticle->trade_price =
						Tools::GetTradePrice($content->ocArticle->prices, $order->orders_date);
				}
				/** @var Orders $order */
				if(UserMailer::SendAdminOrder($order)){
					$order->orders_date = Tools::GetTimeSec();
					$order->orders_status = 4;
					$order->save();
					$this->responseCookies = Yii::$app->response->cookies;
					$this->userCookiesId = Tools::getRandomString();
					$this->responseCookies->add(new Cookie([
						'name' => 'userCookiesId',
						'value' => $this->userCookiesId,
						'expire' => Tools::GetTimeSec() + Yii::$app->params['cookiesTimeout'],
					]));
					$this->addMassage("Заказ подтвержден. В ближайшее время мы свяжемся с вами.");
				}else{
					$this->addMassage('Ошибка при подтверждении заказа.');
				}
			}else{
				throw new NotFoundHttpException();
			}
		}else{
			throw new NotFoundHttpException();
		}
		return $this->render('order', ['massage' => $this->massage]);
	}


	private function addMassage($str){
		$this->massage .= $str.'<br>';
	}

}
