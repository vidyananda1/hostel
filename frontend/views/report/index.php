<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Items;
use app\models\Category;
use app\models\OrderDetail;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;
use app\models\Customer;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DateRangePicker;

$this->title = 'Reports';
?>
<div id="report">
<div class="headings">Admission Report</div>
    

<table style="border:solid black 1px;width:100%;">
    <tr>
        <th>Hosteller Name</th>
        <th>Registration ID</th>
        <th>Amount Paid</th>
        <th>Due Amount</th>
        <th>Date</th>
    </tr>

<?php
foreach($reg as $key=>$value) { 
?>
<tr>
    <td><?=$value["name"]?></td>
    <td><?=$value["reg_id"]?></td>
    <td><?= $value["total"] ?></td>
    <td><?=$value["due_amount"]?></td>
    <td><?= date('d-m-Y',strtotime($value["date"]))?></td>
</tr>
<?php } ?>
<tr>
    <td class="sub-header"  colspan="2">Total (in Rs.)</td>
    <td  class="sub-header"><?=$regsum?></td><td><?=$dueSum?></td>
    <td></td>
</tr>
</table>
</div>
<button id="print">Print</button>
<br><br><br>

<style >
    table,th,td {
        border: 1px solid;
        font-family: 'Open Sans';
        text-align: center;
    }
    .headings{
        font-size: 1.5em;
        font-family: 'Open Sans';
        /* margin-left: 50px; */
    }
    .sub-header{
        text-align: center;
        /* font-weight:bold */
    }
/* @media print {
  header,footer, form { 
    display: none; 
  }
} */
@media print {
  body * {
    visibility: hidden;
  }
  #report, #report * {
    visibility: visible;
  }
  #report {
    position: absolute;
    left: 0;
    top: 0;
  }
}


</style>
<?php
$this->registerJs('
$("#print").click(function(){
    // var divName = "report";
    // var printContents = document.getElementById(divName).innerHTML;
    // document.body.innerHTML = printContents;
    window.print();
})
');