<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "distributors".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property string $address
 * @property int $code
 * @property int $isPostService
 * @property int $canProcessGroup
 */
class Distributors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'distributors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['city_id', 'code', 'isPostService', 'canProcessGroup'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'city_id' => 'City ID',
            'address' => 'Address',
            'code' => 'Code',
            'isPostService' => 'Is Post Service',
            'canProcessGroup' => 'Can Process Group',
        ];
    }
}
