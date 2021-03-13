<?php

namespace app\controllers;


class AdminController extends AppController{

	/**
	 * @return string
	 * @throws \yii\base\InvalidRouteException
	 */
	public function actionIndex(){
		if(!$this->isAdmin)
			$this->runAction('error');
		return $this->render('index', ['isAdmin' => $this->isAdmin]);
	}

}