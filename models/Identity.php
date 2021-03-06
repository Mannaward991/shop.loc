<?php
/**
 * Created by PhpStorm.
 * User: CM
 * Date: 10.03.2021
 * Time: 22:10
 */

namespace app\models;

use app\models\db\Users;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Identity extends Users implements IdentityInterface{

	// Содержит класс Users расширяющий ActiveRecord
	public $user = null;

	/**
	 * Finds an identity by the given ID.
	 *
	 * @param string|int $id the ID to be looked for
	 * @return IdentityInterface the identity object that matches the given ID.
	 * Null should be returned if such an identity cannot be found
	 * or the identity is not in an active state (disabled, deleted, etc.)
	 */
	public static function findIdentity($id){
		return self::findOne(['users_id' => $id]);
	}

	/**
	 * Finds an identity by the given token.
	 *
	 * @param mixed $token the token to be looked for
	 * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
	 * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
	 * @return IdentityInterface the identity object that matches the given token.
	 * Null should be returned if such an identity cannot be found
	 * or the identity is not in an active state (disabled, deleted, etc.)
	 */
	public static function findIdentityByAccessToken($token, $type = null){
		return self::findOne(['users_address' => $token]);
	}

	/**
	 * Returns an ID that can uniquely identify a user identity.
	 *
	 * @return string|int an ID that uniquely identifies a user identity.
	 */
	public function getId(){
		return $this->users_id;
	}

	/**
	 * Returns a key that can be used to check the validity of a given identity ID.
	 *
	 * The key should be unique for each individual user, and should be persistent
	 * so that it can be used to check the validity of the user identity.
	 *
	 * The space of such keys should be big enough to defeat potential identity attacks.
	 *
	 * This is required if [[User::enableAutoLogin]] is enabled.
	 *
	 * @return string a key that is used to check the validity of a given identity ID.
	 * @see validateAuthKey()
	 */
	public function getAuthKey(){
		return $this->users_address;
	}

	/**
	 * Validates the given auth key.
	 *
	 * This is required if [[User::enableAutoLogin]] is enabled.
	 *
	 * @param string $authKey the given auth key
	 * @return bool whether the given auth key is valid.
	 * @see getAuthKey()
	 */
	public function validateAuthKey($authKey){
		return Yii::$app->security->validatePassword($authKey, $this->users_pass);
	}
}