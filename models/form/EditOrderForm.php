<?php

namespace app\models\form;

use yii\base\Model;

class EditOrderForm extends Model{

	public $email;
	public $phone;
	public $addition;

	public function rules(){
		return [
			[['email', 'phone'], 'required', 'message' => 'Поля электронной почты и телефона обязательны к заполнению.'],
			[['email'], 'string', 'max' => 255, 'message' => 'Электронной почты не должна превышать 255 символов.'],
			[['phone'], 'string', 'max' => 20, 'message' => 'Телефон не должен превышать 20 символов.'],
			[['addition'], 'string', 'max' => 5000, 'message' => 'Текст не должен превышать 5000 символов.'],
			[['email'], 'email'],
		];
	}

	public function attributeLabels(){
		return [
			'email' => 'Электронная почта',
			'phone' => 'Телефон',
			'addition' => 'Дополнительно',
		];
	}

}