<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountCat */

// $this->title = 'Update Discount Cat: ' . $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Discount Cats', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="discount-cat-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
