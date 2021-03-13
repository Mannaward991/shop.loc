<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "orders_content".
 *
 * @property int $oc_id id заказа.
 * @property int $oc_article Артикул товара.
 * @property int $oc_quantity Количество товара.
 *
 * @property Goods $ocArticle
 * @property Orders $oc
 */
class OrdersContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['oc_id', 'oc_article', 'oc_quantity'], 'required'],
            [['oc_id', 'oc_article', 'oc_quantity'], 'integer'],
            [['oc_article'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(),
	            'targetAttribute' => ['oc_article' => 'goods_article']],
            [['oc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(),
	            'targetAttribute' => ['oc_id' => 'orders_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'oc_id' => 'Oc ID',
            'oc_article' => 'Oc Article',
            'oc_quantity' => 'Oc Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcArticle()
    {
        return $this->hasOne(Goods::className(), ['goods_article' => 'oc_article']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOc()
    {
        return $this->hasOne(Orders::className(), ['orders_id' => 'oc_id']);
    }
}
