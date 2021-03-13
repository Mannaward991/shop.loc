<?php

namespace app\models\db;

use app\models\Tools;

/**
 * This is the model class for table "goods".
 *
 * @property int $goods_article Уникальный артикул товара, начинается с 100 000.
 * @property string $goods_name
 * @property int $goods_status
 * @property string $goods_description Описание товара.
 * @property string $goods_img
 * @property int $goods_groups Ссылка на группу товара.
 *
 *
 * @property Groups $goodsGroups
 * @property GoodsImg[] $goodsImgs
 * @property OrdersContent[] $ordersContents
 * @property Orders[] $ocs
 * @property Price[] $prices
 */
class Goods extends \yii\db\ActiveRecord
{

	/**
	 * @var array Текущая цена.
	 */
	public $real_price = [];
	/**
	 * @var array Цена при оформлении заказа.
	 */
	public $trade_price = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_article', 'goods_description', 'goods_groups'], 'required'],
            [['goods_article', 'goods_status', 'goods_groups'], 'integer'],
            [['goods_description'], 'string'],
            [['goods_name', 'goods_img'], 'string', 'max' => 255],
            [['goods_article'], 'unique'],
            [['goods_groups'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['goods_groups' => 'groups_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_article' => 'Goods Article',
            'goods_name' => 'Goods Name',
            'goods_status' => 'Goods Status',
            'goods_description' => 'Goods Description',
            'goods_img' => 'Goods Img',
            'goods_groups' => 'Goods Groups',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsGroups()
    {
        return $this->hasOne(Groups::className(), ['groups_id' => 'goods_groups']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersContents()
    {
        return $this->hasMany(OrdersContent::className(), ['oc_article' => 'goods_article']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::className(), ['price_article' => 'goods_article']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGoodsImgs()
	{
		return $this->hasMany(GoodsImg::className(), ['gi_article' => 'goods_article']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOcs()
	{
		return $this->hasMany(Orders::className(), ['orders_id' => 'oc_id'])->viaTable('orders_content', ['oc_article' => 'goods_article']);
	}

    public function initTradePrice($data){
    	$this->trade_price = Tools::GetTradePrice($this->prices, $data);
    }

	public function initRealPrice(){
    	$this->real_price = Tools::GetRealPrices($this->prices);
	}

}
