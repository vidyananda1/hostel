<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Expense */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expense-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    	<div class="col-md-6">
    		<?= $form->field($model, 'ex_name')->textInput(['maxlength' => true])->label('Expense for') ?>
    	</div>
    	<div class="col-md-6">
    		<?= $form->field($model, 'date')->widget(
                        DatePicker::className(), [
                            // inline too, not bad
                             'inline' => false, 
                             
                             'options' => ['placeholder' => '---- Select Date ----','class'=> 'date'],

                             // modify template for custom rendering
                            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                'clientOptions' => [
                                'autoclose' => true,
                                'todayHighlight' => true,
                                'format' => 'yyyy-mm-dd',     


                            ]
                    ])->label('Select Date');?>
    	</div>
    	
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<?= $form->field($model, 'amount')->textInput(['maxlength' => true])->label('Total Amount (Rs)') ?>
    	</div>

    	<div class="col-md-6" style="margin-top: 25px;">
    		<div class="form-group ">
        		<?= Html::submitButton('Add Expense', ['class' => 'btn btn-success btn-md']) ?>
    		</div>
    	</div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
