<?php

namespace frontend\controllers;

use common\models\Blog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BlogController extends Controller
{
    public function actionIndex()
    {
        $blogs = Blog::find()->where(['status_id'=>1])->orderBy('sort');
        $dataProvider = new ActiveDataProvider([
            'query' => $blogs,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);
        return $this->render('all',['dataProvider'=>$dataProvider]);
    }

    public function actionOne($url)
    {
        if($blog = Blog::find()->where(['url'=>$url])->one()){
            return $this->render('one',['blog'=>$blog]);
        }
        throw new NotFoundHttpException('Блог не найден');
    }


}
