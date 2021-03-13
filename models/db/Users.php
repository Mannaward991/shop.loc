<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $users_id
 * @property string $users_name
 * @property string $users_email
 * @property string $users_phone
 * @property string $users_pass
 * @property int $users_datereg
 * @property string $users_check
 * @property int $users_status
 * @property string $users_address
 * @property string $users_sess
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['users_name', 'users_email', 'users_pass', 'users_datereg', 'users_check', 'users_status', 'users_address', 'users_sess'], 'required'],
            [['users_phone', 'users_datereg', 'users_status'], 'integer'],
            [['users_name', 'users_email'], 'string', 'max' => 128],
            [['users_pass', 'users_check', 'users_address'], 'string', 'max' => 64],
            [['users_sess'], 'string', 'max' => 32],
            [['users_address'], 'unique'],
            [['users_email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'users_id' => 'Users ID',
            'users_name' => 'Users name',
            'users_email' => 'Users Email',
            'users_phone' => 'Users phone',
            'users_pass' => 'Users pass',
            'users_datereg' => 'Users registration date',
            'users_check' => 'Users check',
            'users_status' => 'Users status',
            'users_address' => 'Users address',
            'users_sess' => 'Users session',
        ];
    }
}
