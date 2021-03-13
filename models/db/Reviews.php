<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $reviews_id id коментария
 * @property string $reviews_name Имя пользователя
 * @property string $reviews_email Электронная почта
 * @property string $reviews_text Текст коментария
 * @property int $reviews_status Статус коментария
 * @property string $reviews_confirmation Ссылка подтверждения коментария
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reviews_text'], 'string'],
            [['reviews_name'], 'string', 'max' => 50],
            [['reviews_email'], 'email'],
	        [['reviews_status'], 'integer', 'min' => 0, 'max' => 3],
	        [['reviews_confirmation'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reviews_id' => 'Reviews ID',
            'reviews_name' => 'Reviews Name',
            'reviews_email' => 'Reviews Email',
            'reviews_text' => 'Reviews Text',
            'reviews_status' => 'Reviews Status',
            'reviews_confirmation' => 'Reviews Confirmation',
        ];
    }
}
