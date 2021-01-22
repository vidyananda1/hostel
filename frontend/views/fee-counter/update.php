<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FeeCounter */

// $this->title = 'Update Fee Counter: ' . $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Fee Counters', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="fee-counter-update">

    <?= $this->render('_form', [
        'model' => $model,
        'details' => $details,
    ]) ?>

</div>
