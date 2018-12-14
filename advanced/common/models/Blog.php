<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $url
 * @property int $status_id
 * @property int $sort
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['text'], 'string'],
            [['url'], 'unique'],
            [['sort'], 'integer', 'max' => 99, 'min' => 1],
            [['status_id'], 'integer', 'max' => 1, 'min' => 0],
            [['title', 'url'], 'string', 'max' => 150],
        ];
    }

    public static function getStatusList()
    {
        return [0=>'отключен',1=>'включен'];
    }

    public function getStatusName(){
        return self::getStatusList()[$this->status_id];
    }

    public function getAuthor(){
        return $this->hasOne(User::className(),['id'=>'user_id']);

    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'url' => 'Url',
            'status_id' => 'Статус',
            'sort' => 'Порядок сортировки',
        ];
    }
}
