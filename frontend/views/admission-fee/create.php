<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdmissionFee */

// $this->title = 'Create Admission Fee';
// $this->params['breadcrumbs'][] = ['label' => 'Admission Fees', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="admission-fee-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
