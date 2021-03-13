<?php

namespace app\models\form;

use yii\base\Model;

class AddReviewForm extends Model{

	public $reviews_name;
	public $reviews_text;
	public $reviews_email;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['reviews_name', 'reviews_text', 'reviews_email'], 'required'],
			[['reviews_name'], 'string', 'min' => 3, 'max' => 50],
			[['reviews_email'], 'email'],
			[['reviews_text'], 'string', 'min' => 5, 'max' => 1000],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'reviews_name' => 'Имя пользователя',
			'reviews_email' => 'Электронная почта',
			'reviews_text' => 'Текст сообщения',
		];
	}

}