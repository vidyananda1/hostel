<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountCat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discount-cat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dis_cat_name')->textInput(['maxlength' => true])->label('Discount Category Name') ?>

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
