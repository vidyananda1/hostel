<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountCat */

// $this->title = 'Create Discount Cat';
// $this->params['breadcrumbs'][] = ['label' => 'Discount Cats', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-cat-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
