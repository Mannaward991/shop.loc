<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property int $price_article Ссылка на артикул товара.
 * @property int $price_date UNIX - время
 * @property int $price_price Цена записана в копейках российских рублей.
 *
 * @property Goods $priceArticle
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_article', 'price_date', 'price_price'], 'required'],
            [['price_article', 'price_date', 'price_price'], 'integer'],
            [['price_article', 'price_date'], 'unique', 'targetAttribute' => ['price_article', 'price_date']],
            [['price_article'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['price_article' => 'goods_article']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'price_article' => 'Price Article',
            'price_date' => 'Price Date',
            'price_price' => 'Price Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriceArticle()
    {
        return $this->hasOne(Goods::className(), ['goods_article' => 'price_article']);
    }
}
