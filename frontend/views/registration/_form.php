<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\DiscountCat;
use app\models\AdmissionFee;
use app\models\Discount;
use app\models\Batch;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Registration */
/* @var $form yii\widgets\ActiveForm */
$cat= ArrayHelper::map(DiscountCat::find()->all(), 'id', 'dis_cat_name');
$admfee= ArrayHelper::map(AdmissionFee::find()->all(), 'fee', 'fee');
$dis= ArrayHelper::map(Discount::find()->all(), 'dis_percent', 'dis_name');
$batch= ArrayHelper::map(Batch::find()->where(['record_status'=>'1'])->all(), 'id', 'batch_name');
?>

<div class="registration-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <p style="padding-left: 15px;font-size: 17px;color:#188a94;"><b>Personal Informations</b></p>
        <div class="col-md-4">
           <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?> 
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
           <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?> 
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4">
           <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
           <?= $form->field($model, 'aadhaar')->textInput(['maxlength' => true]) ?>
        </div>
        
    </div>
    <div style="padding:10px;">
       <hr style="border: solid 1px #188a94;"> 
    </div>
    
    <div class="row">
        <p style="padding-left: 15px;font-size: 17px;color:#188a94;"><b>Payment Details</b></p>
        
        
        <div class="col-md-4">
            
            <?= $form->field($model, 'batch')->dropdownList($batch,['prompt'=>'---- Select Batch ----'])->label('Batch'); ?>
        </div>
        <div class="col-md-4">
            
           <?= $form->field($model, 'admission_fee')->textInput(['maxlength' => true,'readonly'=>true])->label('Admission Fee') ?>
        </div>
        <div class="col-md-4">
            
            
            <?= $form->field($model, 'discount')->dropdownList($dis,['prompt'=>' Select Discount Type '])->label('Discount (if any)'); ?>
        </div>
        
       
        
    </div>
    <div class="row">
       
        <div class="col-md-4">
            
            <?= $form->field($model, 'discount_cat')->dropdownList($cat,['prompt'=>'--- Select Category ---'])->label('Discount Category'); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'amount_payable')->textInput(['maxlength' => true,'readonly'=>true])->label('Payable Amount') ?>
        </div>
         <div class="col-md-4">
            <?= $form->field($model, 'paid_amount')->textInput() ?>
        </div>
      
    </div>
    <div class="row">
       
        <div class="col-md-4">
            <?= $form->field($model, 'due_amount')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
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
         <div class="col-md-4">
            <?= $form->field($model, 'status')->dropDownList([ 'Fully Paid' => 'Fully Paid', 'Partially Paid' => 'Partially Paid', 'Not Paid' => 'Not Paid', ], ['prompt' => '']) ?>
        </div>
        
    </div>
    <br>
    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
    $fee = Url::to(["fee"]);
    $this->registerJs('
    
    $(document).on("change", "#registration-batch",   function () {
    var code = $("#registration-batch").val();
    var url = "'.$fee.'";
    $.post(url+"&id="+code, function(data) {
                if(!data)
                {
                  alert("Batch not found !!");
                } 
                else{
                    var value = $.parseJSON(data); 
                    $("#registration-admission_fee").val(value.adfee); 
                    $("#registration-amount_payable").val(value.adfee); 
                }
            });
  });

    $("#registration-batch").change(function() {  
        updateTotal();
    });

    $("#registration-admission_fee").change(function() {  
        updateTotal();
    });

    $("#registration-amount_payable").change(function() {  
        updateTotal();
    });
    $("#registration-discount").change(function() {  
        updateTotal();
    });
    $("#registration-paid_amount").change(function() {  
        updateTotal();
    });
    $("#registration-due_amount").change(function() {  
        updateTotal();
    });

    var updateTotal = function () {
      var input1 = $("#registration-admission_fee").val();
      var input2 = $("#registration-discount").val();
      var input3 = $("#registration-amount_payable").val();
      var input4 =  $("#registration-paid_amount").val();
      var input5 =  $("#registration-due_amount").val();
     
      if(input1==""){
        input1 = 0;
      }else{
        input1=parseInt($("#registration-admission_fee").val());
      }
      if(input2==""){
        input2 = 0;
      }else{
        input2 = parseInt($("#registration-discount").val());
      }
       if(input3==""){
        input3 = 0;
      }else{
        input3 = parseInt($("#registration-amount_payable").val());
      }
       if(input4==""){
        input4 = 0;
      }else{
        input4 = parseInt($("#registration-paid_amount").val());
      }

      $("#registration-amount_payable").val(input1-((input2/100)* input1 ));
      $("#registration-due_amount").val( (input1-((input2/100)* input1 ))-input4 );
      
      
    };
    
    ')
?>
