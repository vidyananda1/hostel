<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FeeCounter */
?>
<div class="fee-counter-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'details' => $details,
    ]) ?>

</div>
