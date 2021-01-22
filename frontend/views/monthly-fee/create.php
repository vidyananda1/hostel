<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MonthlyFee */

// $this->title = 'Create Monthly Fee';
// $this->params['breadcrumbs'][] = ['label' => 'Monthly Fees', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="monthly-fee-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
