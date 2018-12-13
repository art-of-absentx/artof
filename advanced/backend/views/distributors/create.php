<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Distributors */

$this->title = 'Create Distributors';
$this->params['breadcrumbs'][] = ['label' => 'Distributors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributors-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
