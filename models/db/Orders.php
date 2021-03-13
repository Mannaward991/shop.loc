<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $orders_id id заказа.
 * @property int $orders_date Дата создания заказа.
 * @property string $orders_email Электронная почта заказчика.
 * @property string $orders_phone Телефон заказчика.
 * @property string $orders_addition Дополнительные данные заказа.
 * @property int $orders_status Статус заказа.
 * Стадии оформления заказа:
 * 1 - создан, но не оформлен,
 * 2 - оформлен, но не подтвержден,
 * 3 - заказ ожидает подтверждения (отправлено письмо) TODO
 * 4 - заказ подтвержден,
 * 5 - заказ обработан и отправлен,
 * 6 - заказ завершон (оплачен),
 * 9 - заказ отменен.
 * @property string $orders_cookies_id Id сесси, к которой привязан заказ.
 * @property string $orders_confirmation Ссылка подтверждения заказа.
 *
 * @property OrdersContent[] $ordersContents
 * @property Goods[] $ocArticles
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orders_date'], 'required'],
            [['orders_date'], 'integer'],
            [['orders_addition'], 'string'],
            [['orders_email'], 'string', 'max' => 255],
            [['orders_phone'], 'string', 'max' => 20],
            [['orders_status'], 'integer', 'min' => 0, 'max' => 255],
            [['orders_cookies_id'], 'string', 'max' => 32],
	        [['orders_confirmation'], 'string', 'max' => 32],
	        [['orders_email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orders_id' => 'Номер заказа',
            'orders_date' => 'Дата создания заказа',
            'orders_email' => 'Электронная почта',
            'orders_phone' => 'Телефон',
            'orders_addition' => 'Дополнительные данные',
            'orders_status' => 'Статус',
            'orders_cookies_id' => 'Cookies ID',
	        'orders_confirmation' => 'href',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersContents()
    {
        return $this->hasMany(OrdersContent::className(), ['oc_id' => 'orders_id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOcArticles()
	{
		return $this->hasMany(Goods::className(), ['goods_article' => 'oc_article'])
			->viaTable('orders_content', ['oc_id' => 'orders_id']);
	}

}
