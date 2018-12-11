<?php

namespace frontend\controllers;

use common\models\Blog;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BlogController extends Controller
{
    public function actionIndex()
    {
        $blogs = Blog::find()->where(['status_id'=>1])->orderBy('sort')->all();
        return $this->render('all',['blogs'=>$blogs]);
    }

    public function actionOne($url)
    {
        if($blog = Blog::find()->where(['url'=>$url])->one()){
            return $this->render('one',['blog'=>$blog]);
        }
        throw new NotFoundHttpException('Блог не найден');
    }


}
