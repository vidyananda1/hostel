<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Batch;
use app\models\DiscountCat;
use app\models\Discount;
use app\models\Month;
use app\models\MonthlyFee;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\FeeCounter */
/* @var $form yii\widgets\ActiveForm */
//$batch= ArrayHelper::map(Batch::find()->all(), 'id', 'batch_name');
$cat= ArrayHelper::map(DiscountCat::find()->all(), 'id', 'dis_cat_name');
$dis= ArrayHelper::map(Discount::find()->all(), 'dis_percent', 'dis_name');
?>

<div class="fee-counter-form">

    <div style="font-size: 17px; font-weight:bold;color:#48169e;">
        <p class="text-left"> Name : <?= $details->name ?></p>
        <p>Hosteller ID : <?= $details->reg_id ?></p>
    </div>
    <br>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'batch')->dropDownList(
                    ArrayHelper::map(Batch::find()->all(),"id","batch_name"),
                    ['prompt'=>'select Batch'])->label('Batch');
            ?>
        </div>
        <div class="col-md-4">

           <?=  $form->field($model, 'month')->dropDownList(
                ArrayHelper::map(Month::find()->all(),"id","month_name"),
                ['prompt'=>'select Month'])->label('Month');

           ?> 
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'payable_amount')->textInput(['maxlength' => true,'readonly'=>true]) ?> 
        </div>

        
        
        
    </div>
     <div class="row">
         <div class="col-md-6">
            <?= $form->field($model, 'amount_receive')->textInput(['maxlength' => true]) ?> 
        </div>
        
        <div class="col-md-6">
            <?= $form->field($model, 'due_amount')->textInput(['maxlength' => true]) ?>
        </div>
        
    </div>
    <div class="row">
        
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
        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList([ 'Fully Paid' => 'Fully Paid', 'Partially Paid' => 'Partially Paid', 'Not Paid' => 'Not Paid', ], ['prompt' => '']) ?> 
        </div>
        
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
    $fee = Url::to(["fee"]);
    $this->registerJs('
    

    $("#feecounter-batch").change(function() {  
        updateTotal();
    });

    $("#feecounter-month").change(function() {  
        updateTotal();
    });

    $("#feecounter-payable_amount").change(function() {  
        updateTotal();
    });
    
    $("#feecounter-amount_receive").change(function() {  
        updateTotal();
    });
    $("#feecounter-due_amount").change(function() {  
        updateTotal();
    });

    var updateTotal = function () {
      var batch = $("#feecounter-batch").val();
      var month = $("#feecounter-month").val();
      var input1 =  $("#feecounter-payable_amount").val();
      var input2 =  $("#feecounter-amount_receive").val();
      var input3 =  $("#feecounter-due_amount").val();
      
      if(input1==""){
        input1 = 0;
      }else{
        input1=parseInt($("#feecounter-payable_amount").val());
      }
      if(input2==""){
        input2 = 0;
      }else{
        input2 = parseInt($("#feecounter-amount_receive").val());
      }
       if(input3==""){
        input3 = 0;
      }else{
        input3 = parseInt($("#feecounter-due_amount").val());
      }
      
      var url = "'.$fee.'";
      $.post(url+"&bat="+batch+"&mon="+month, function(data) {
                if(!data)
                {
                  alert("Batch/Month not found !!");
                } 
                else{
                        var value = $.parseJSON(data); 
                        $("#feecounter-payable_amount").val(value.adfee);
                        


                }
            });   

           $("#feecounter-due_amount").val( input1-input2);    
      
    };
    
    ')
?>