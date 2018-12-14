<?php

/* @var $this yii\web\View */
/* @var $blog \common\models\Blog */

use yii\helpers\Html;
use yii\widgets\DetailView;


//$this->title = $blog->url;
//$this->params['breadcrumbs']['blog'] = $this->title;
?>


<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'title',
        'text:text',
        'url:url',
        [
            'label' => 'Owner',
            'value' => $model->author->username,
        ],

    ],
]) ?>
