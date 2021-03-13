<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $groups_id id группы. Первая цифра резерв, две последующие - код отдела, две последние - код группы.
 * @property string $groups_name Название группы.
 * @property string $groups_img Сселка на изображение.
 * @property int $groups_status Статус группы. 1 - обычная группа, 2 - группа заблокированна.
 *
 * @property Goods[] $goods
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groups_id', 'groups_name'], 'required'],
            [['groups_id', 'groups_status'], 'integer'],
            [['groups_name', 'groups_img'], 'string', 'max' => 255],
            [['groups_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'groups_id' => 'Groups ID',
            'groups_name' => 'Groups Name',
            'groups_img' => 'Groups Img',
            'groups_status' => 'Groups Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['goods_groups' => 'groups_id']);
    }
}
