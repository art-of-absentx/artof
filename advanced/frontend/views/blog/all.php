<?php

/* @var $this yii\web\View */
/* @var $blogs \common\models\Blog */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'blog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">Blogs.</p>

      <?php // <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>?>
    </div>

<!--    <div class="body-content">-->
<!---->
<!--        <div class="row">-->
<!--            --><?php // foreach ($blogs as $one): ?>
<!--                <div class="col-lg-12">-->
<!--                    <h2>--><?//=$one->title?><!--</h2>-->
<!---->
<!--                    <p>--><?//=$one->text?><!--</p>-->
<!--                    --><?//= Html::a('подробнее',['blog/one','url'=>$one->url])?>
<!--                </div>-->
<!--            --><?php //endforeach;?>
<!--            -->
<!--            -->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'itemView' => '_one',

    ]); ?>

</div>