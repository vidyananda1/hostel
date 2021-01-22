<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Month */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="month-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'month_name')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
