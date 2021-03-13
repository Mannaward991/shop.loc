<?php

namespace app\models\form;

use yii\base\Model;

class AddProductForm extends Model{

	public $id;
	public $quantity;

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			// username and password are both required
			[['id', 'quantity'], 'required'],
			// rememberMe must be a boolean value
			['id', 'integer', 'max' => 999999],
			// password is validated by validatePassword()
			['quantity', 'integer', 'max' => 99, 'message' => 'Превышено допустимое колличество товара.'],
		];
	}



}