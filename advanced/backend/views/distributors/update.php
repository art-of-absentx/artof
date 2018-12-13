<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Distributors */

$this->title = 'Update Distributors: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Distributors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distributors-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
