<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use app\models\Batch;
use app\models\Month;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MonthlyFeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Monthly Fees';
// $this->params['breadcrumbs'][] = $this->title;
$batch= ArrayHelper::map(Batch::find()->all(), 'id', 'batch_name');
$month= ArrayHelper::map(Month::find()->all(), 'id', 'month_name');

?>
<div class="monthly-fee-index">
    <br><br>
    <p>
        <?= Html::a('Create Monthly Fee', ['create'], ['class' => 'btn btn-primary popup']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br><br><br>
    <div class="panel panel-body bod" >
        <div class="panel-heading head rot" style="">
            Showing created MONTHLY FEE details  
        </div>
        <br><br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' =>['class' => 'table table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            // 'mon_fee',
            [
                'attribute'=>'mon_fee',
                'label'=>'Monthly Fee (in Rs)',
            ],
            //'month',
            [
                'attribute'=>'month',
                'value' => function ($model) use($month) {
                return isset($model->month) ? $month[$model->month] : ' ';
                },
                'format' => 'raw',
                'filter' => $month,

            ],

            [
                'attribute'=>'batch',
                'value' => function ($model) use($batch) {
                return isset($model->batch) ? $batch[$model->batch] : ' ';
                },
                'format' => 'raw',
                'filter' => $batch,

            ],
            // 'created_by',
            //'created_date',
            //'record_status',

            [
            'value' => function ($model) {
              return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['monthly-fee/update', 'id' => $model->id], ['class' => 'btn btn-xs btn-warning popup1']);  
                        },
                        'format' => 'raw',
                    ],
        ],
    ]); ?>


</div>
</div>

<link href='https://fonts.googleapis.com/css?family=Oregano' rel='stylesheet'>
<style type="text/css">
    .head{
        padding:17px;
        margin-top: -50px;
        border-radius: 10px;
        background-color: #e647b1;
        color: #f5f8fc;
        font-family: 'Oregano';
        font-size: 20px;
        box-shadow: 1px 1px 4px gray;
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
              transform: scale(1.04,1.04);
            
    }
    .bod{
        padding: 20px;
        box-shadow: 1px 1px 3px gray;
    }
    
</style>
<?php

Modal::begin([

            'header' => '<h4>Create Monthly Fee</h4>',

            'id' => 'jobPop',

            'size' => 'modal-md',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
            


        ]);


       

        Modal::end();

Modal::begin([

            'header' => '<h4>Update Monthly Fee</h4>',

            'id' => 'jobPop1',

            'size' => 'modal-md',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
            


        ]);


       

        Modal::end();
?>



<?php $this->registerJs("$(function() {

   $('.popup').click(function(e) {
     e.preventDefault();
     $('#jobPop').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });
    $('.popup1').click(function(e) {
     e.preventDefault();
     $('#jobPop1').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });
});");
