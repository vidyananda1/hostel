<?php
use dosamigos\datepicker\DateRangePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin([
              // 'action' => ['index'],
              // 'method' => 'get',
              'id'=>$formName
          ]); ?>
       <?= DateRangePicker::widget([
    'name' => 'date_from',
    'value' => date("Y-m-d"),
    'nameTo' => 'name_to',
    'valueTo' =>  date("Y-m-d"),
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'
    ]
]);?>                
          <button type="submit" id=<?=$button?> url=<?=$url ?> class="btn btn-success reportBtn"  formtarget="_blank">Submit</button>
          <?= Html::a('Reset', ['index'], ['class' => 'btn btn-primary','size'=>'sm', 'header'=>'Create Tax']) ?>
      <?php ActiveForm::end(); ?>

      <?php
        // echo $div;die;
$this->registerJs('
var button = "'.$button.'"; 


$(document).on("click",`#${button}`,function(){
  event.preventDefault();
  var form = "'.$formName.'";
  // var name= form.attr("name");
  form = $(`#${form}`);
  var url =$(this).attr("url");
  console.log(url);
  // return false;
  var endDate = $(`input[name="name_to"]`,form).val(); 
  var startDate = $(`input[name="date_from"]`,form).val(); 
  var div ="'.$div.'"; 

  
  console.log(startDate);
  // return false;
  if(!startDate || !endDate)
    return false;

  url = `${url}&startDate=${startDate}&endDate=${endDate}`;

  console.log(url);
  console.log(div);
  $(`#${div}`).load(url);
});
');