<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

?>
<div class="staff-update">


    <?= $this->render('_form', [
        'model' => $model,
        'update' => true
    ]) ?>

</div>
