<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdmissionFee */

// $this->title = 'Update Admission Fee: ' . $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Admission Fees', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="admission-fee-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
