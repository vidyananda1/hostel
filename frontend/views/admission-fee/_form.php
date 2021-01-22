<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Batch;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\AdmissionFee */
/* @var $form yii\widgets\ActiveForm */
$batch= ArrayHelper::map(Batch::find()->all(), 'id', 'batch_name');
?>

<div class="admission-fee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fee')->textInput(['maxlength' => true])->label('Admission fee (in Rs)') ?>

    <?= $form->field($model, 'batch')->dropdownList($batch,['prompt'=>'------- Select Batch -------'])->label('Batch type'); ?>


    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
