<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MonthlyFee */

// $this->title = 'Update Monthly Fee: ' . $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Monthly Fees', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="monthly-fee-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
