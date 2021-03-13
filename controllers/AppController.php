<?php

namespace app\controllers;

use app\models\Tools;
use yii\base\Action;
use yii\web\Controller;
use yii\web\Cookie;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class AppController extends  Controller{

	//
	protected $requestCookies;
	//
	protected $responseCookies;
	//Id по которому определяется сессия клиента.
	protected $userCookiesId;
	//Форматированная строка сообщений пользователю.
	protected $massage = '';
	//Индикатор админа.
	protected $isAdmin = false;


	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['login', 'logout', 'signup'],
				'rules' => [
					[
						'allow' => true,
						'actions' => ['login', 'signup'],
						'roles' => ['?'],
					],
					[
						'allow' => true,
						'actions' => ['logout'],
						'roles' => ['@'],
					],
				],
			],
		];
	}

	/**
	 * @param Action $action
	 * @return bool
	 * @throws \yii\base\InvalidRouteException
	 * @throws \yii\web\BadRequestHttpException
	 */
	public function beforeAction($action){
		Yii::$app->layout = 'admin';
		//Установка названия сайта
		Yii::$app->name = Yii::$app->params['siteName'];
		//Запуск сессий.
		//Yii::$app->session->open();
		$this->startCookies();
		return parent::beforeAction($action);
	}

	//Настройка cookies.
	protected function startCookies(){
		$this->requestCookies = Yii::$app->request->cookies;
		$this->responseCookies = Yii::$app->response->cookies;
		if (isset($this->requestCookies['userCookiesId'])) {
			if($this->IsAdmin($this->requestCookies['userCookiesId']->value))
				$this->isAdmin = true;
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

	protected function addMassage($str){
		$this->massage .= '<br>'.$str;
	}

	protected function IsAdmin($string){
		if(Tools::getHash(Yii::$app->params['adminLogin'].Yii::$app->params['adminPass']) === $string)
			return true;
		else
			return false;
	}

	public function actionError(){
		$this->viewPath = "@app/views/admin";
		return $this->render('error');
	}

}