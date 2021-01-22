<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Batch;
use app\models\Month;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MonthlyFee */
/* @var $form yii\widgets\ActiveForm */
$batch= ArrayHelper::map(Batch::find()->all(), 'id', 'batch_name');
$month= ArrayHelper::map(Month::find()->all(), 'id', 'month_name');
?>

<div class="monthly-fee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mon_fee')->textInput(['maxlength' => true])->label('Monthly fee (in Rs)') ?>
    
    <?= $form->field($model, 'batch')->dropdownList($batch,['prompt'=>'------- Select Batch -------'])->label('Batch type'); ?>

    <?= $form->field($model, 'month')->dropdownList($month,['prompt'=>'------- Select Month -------'])->label('Month type'); ?>
    

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
