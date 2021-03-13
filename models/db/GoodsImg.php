<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "goods_img".
 *
 * @property int $gi_article
 * @property string $gi_href
 *
 * @property Goods $giArticle
 */
class GoodsImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gi_article'], 'integer'],
            [['gi_href'], 'string', 'max' => 255],
            [['gi_article'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['gi_article' => 'goods_article']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gi_article' => 'Gi Article',
            'gi_href' => 'Gi Href',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGiArticle()
    {
        return $this->hasOne(Goods::className(), ['goods_article' => 'gi_article']);
    }
}
