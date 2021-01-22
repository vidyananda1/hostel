<?php
use dosamigos\datepicker\DateRangePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
//$this->title = "Reports";


?>
<link href='https://fonts.googleapis.com/css?family=Oregano' rel='stylesheet'>
<div class="row">
<div class="col-md-12" style="padding-right: 50px;">
    <div class="head" style="font-family: 'Oregano';color: #4a4a43;font-size: 24px;" >
        <span class="glyphicon glyphicon-file" >&nbsp;</span>Showing Report Breakup
    </div>
  
<br><br>
<div class="panel panel-body" style="box-shadow: 1px 2px 3px gray;">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Admission</a></li>
    <li><a data-toggle="tab" href="#menu1">Monthly-Fee</a></li>
    <li><a data-toggle="tab" href="#menu2">Expenses</a></li>
    
  </ul>

  <div class="tab-content">
    <br>
    <div id="home" class="tab-pane fade in active">
        <div class="col-md-3 label label-primary">
            <h4> Admission Report</h4>
        </div>
      <br><br><br>
      <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
      <?= $form->field($model, 'start_date')->widget(DateRangePicker::className(), [
            
            'attributeTo' => 'end_date', 
            // 'language' => 'ru',
            'labelTo' => 'to',
        //    'size' => 'lg',
            
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-d',
                
                'todayHighlight' => true,
            ]
        ])->label('Select Date Range');?>                        
        <button type="submit" id="btnSearch" class="btn btn-success" formtarget="_blank">Submit</button>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-primary','size'=>'sm', 'header'=>'Create Tax']) ?>
    <?php ActiveForm::end(); ?>
    
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="col-md-3 label label-success">
            <h4> Monthly Fee Report</h4>
        </div>
        <br><br><br>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <div class="col-md-3 label label-warning">
            <h4> Expenses Report</h4>
        </div>
        <br><br><br>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>

        
</div>
</div>
</div>
<style type="text/css">
    
    .head{
      border:solid 1px #e4eb09;
      background-color: #e4eb09;
      padding: 17px;
      border-radius: 10px;
      box-shadow: 1px 2px 4px gray;
      transform: translateZ(0);
      transition: all .3s cubic-bezier(.34,1.61,.7,1);

    }   
    .head:hover {
              transform: scale(1.03,1.03);
            
    }
</style>