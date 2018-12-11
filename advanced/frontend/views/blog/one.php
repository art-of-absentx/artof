<?php

/* @var $this yii\web\View */
/* @var $blog \common\models\Blog */

use yii\helpers\Html;

$this->title = 'blog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">Blogs.</p>

      <?php // <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>?>
    </div>

    <div class="body-content">

        <div class="row">

                    <h2><?=$blog->title?></h2>

                    <p><?=$blog->text?></p>

        </div>

    </div>
</div>