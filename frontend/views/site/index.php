
<?php
use app\models\Registration;
use app\models\FeeCounter;
 

//use app\models\Counterno;

$this->title = '';

$reg = Registration::find()->where(['record_status'=>'1'])->count();
// $mem = Member::find()->where(['record_status'=>'1'])->count();
$admfee = Registration::find()->where(['record_status'=>'1'])->sum('paid_amount');
$monthfee = FeeCounter::find()->where(['record_status'=>'1'])->sum('amount_receive');

?>

<link href='https://fonts.googleapis.com/css?family=Oregano' rel='stylesheet'>
<H3 style="text-align:center;color: #7B68EE;"></H3>
<br>
<div class="row ">
    <div class="col-lg-4 col-xs-4">
      <div class="info-box shadow" style="border-radius: 3px;padding:5px 10px 10px 20px;">

        <span class="info-box-icon bg-aqua ani" style="box-shadow: 1px 1px 4px  #bec2c4;"><i class="fa fa-users" ></i></span>

        <div class="info-box-content text-center" >
          <span class="info-box-text"style="text-align:center;font-family: 'Oregano';font-size: 18px;">Total Hostellers</span>
          <span class="info-box-number" style="text-align:center;font-family: 'Oregano';font-size: 22px;"><?= $reg ?></span>
        </div>

      </div>
      
    </div>
    <div class="col-lg-4 col-xs-4">
      <div class="info-box shadow" style="border-radius: 3px;padding:5px 10px 10px 20px;">

        <span class="info-box-icon bg-yellow ani" style="box-shadow: 1px 1px 4px  #bec2c4;"><i class="fa fa-usd" ></i></span>

        <div class="info-box-content text-center" >
          <span class="info-box-text"style="text-align:center;font-family: 'Oregano';font-size: 18px;">Admission Fee Amount</span>
          <span class="info-box-number" style="text-align:center;font-family: 'Oregano';font-size: 22px;">Rs <?= $admfee ?></span>
        </div>

      </div>
      
    </div>

    <div class="col-lg-4 col-xs-4">
      <div class="info-box shadow" style="border-radius: 3px;padding:5px 10px 10px 20px;">

        <span class="info-box-icon bg-green ani" style="box-shadow: 1px 1px 4px  #bec2c4;"><i class="fa fa-usd" ></i></span>

        <div class="info-box-content text-center" >
          <span class="info-box-text"style="text-align:center;font-family: 'Oregano';font-size: 18px;">Monthly Fee Amount</span>
          <span class="info-box-number" style="text-align:center;font-family: 'Oregano';font-size: 22px;">Rs <?= $monthfee ?></span>
        </div>

      </div>
      
    </div>
    
   
  </div>


<br><br><br>
<div class="row">
<div class="col-md-6 ">
  <div class="card shadow " style="background-color: white;padding: 25px;" >
    <div class="card-header rot" >
        <div class="row" >
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
              <h4 style="text-align:center;font-family: 'Oregano';font-size: 20px;color: #f5f8fc">Admission Fee Collection</h4>
            </div>
        </div>
    </div>
    <div class="card-body" style="margin-bottom: 10px;">
        <div id="invested_div" ></div>
    </div>
  </div>
</div>
<div class="col-md-6 " >
<div class="card shadow" style="background-color: white;padding: 25px;">
  <div class="card-header rot">
      <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <h4 style="text-align:center;font-family: 'Oregano';font-size: 20px;color: #f5f8fc">Monthly Fee Collection</h4>
          </div>
      </div>
  </div>
  <div class="card-body" >
    <div id="interests_div" ></div>
  </div>
</div>

</div>
</div>

  <!-- <div id="invested_div" ></div> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);
function drawBasic() {
  var columns=[];
  columns.push(["Month","Amount"]);
  var invested =$invested ;
  var interests = $interests ;
  invested = columns.concat(invested);
  interests = columns.concat(interests);
  
  var invested = google.visualization.arrayToDataTable(invested);
  var interests = google.visualization.arrayToDataTable(interests);

  var options = {
    // title:"",
    width: 200,
    height: 330,
    legend: { position: 'top' },
    bar: { groupWidth: '40%' },
    
  };


  var interests_options = {
    // title:"",
    width: 200,
    height: 330,
    legend: { position: 'top' },
    bar: { groupWidth: '40%' },
    
  };
  

  var chartInterests = new google.visualization.ColumnChart(
  document.getElementById('interests_div'));
  
  var chartInvested = new google.visualization.ColumnChart(
  document.getElementById('invested_div'));


  chartInterests.draw(interests,interests_options);
  
  chartInvested.draw(invested,options);
} 
</script>
<style>
  .shadow {
              
              box-shadow: 2px 5px 6px #bfbbbb;;
              border-radius: 5px;
            }
    .background{
                opacity: 0.2;
                background: linear-gradient(to right, #99ccff 12%, #3366cc 114%);
                position: fixed; 
                margin-left: -10%;
                margin-top:-5%;
                margin-right: -3%;
                width: 150%; 
                height: 100%;

            }
  .card {
    margin-top: 12px;
    border: thin solid #ccc;
    border-radius: 4px;
    height: 410px;
}
.card-body, .card-header, .card-footer {
    padding: 12px;
}
.card-label {
    text-transform: uppercase;
    font-size: 12px;
    font-family: 'IBM Plex Sans', sans-serif;
    min-height: 34px;
}
.card-value {
    font-size: 36px;
}
.card-summary {
    font-size: 10px;
    padding-left: 8px;
}
.card-header {
    border-bottom: thin solid #ccc;
}
.card-footer {
    border-top: thin solid #ccc;
}
.ani{
      margin-top:-20px;
      border-radius: 5px;
      transform: translateZ(0);
      transition: all .3s cubic-bezier(.34,1.61,.7,1);

    }        
    .ani:hover {
            position: relative; 
            margin-top:-60px;
            
    }
    .rot{
      background-color:#e647b1;
      padding: 20px;
      margin-top: -65px;
      border-radius: 5px;
      transform: translateZ(0);
      transition: all .3s cubic-bezier(.34,1.61,.7,1);

    }   
    .rot:hover {
              transform: scale(1.1,1.1);
            
    }

</style>