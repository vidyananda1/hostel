<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use app\models\Month;
use app\models\Batch;
use app\models\Registration;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeeCounterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Fee Counters';
// $this->params['breadcrumbs'][] = $this->title;

$batch= ArrayHelper::map(Batch::find()->all(), 'id', 'batch_name');
$month= ArrayHelper::map(Month::find()->all(), 'id', 'month_name');
$status=[ 'Fully Paid' => 'Fully Paid', 'Partially Paid' => 'Partially Paid', 'Not Paid' => 'Not Paid', ];
?>
<div class="fee-counter-index">

    
    <br><br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php  

    $gridColumns = [
            'registration_id',
            [
                'attribute'=>'batch',
                'value'=> function($model) use($batch){
                    return isset($batch) ? $batch[$model->batch] : '';
                },

                'filter'=>$batch,
            ],
            [
                'attribute'=>'month',
                'value'=> function($model) use($month){
                    return isset($month) ? $month[$model->month] : '';
                },

                'filter'=>$month,
            ],
            
            [
                'attribute'=>'customer_id',
                'value'=>function($model) {
                    $name = Registration::find()->where(['id'=>$model->customer_id])->one();
                    return isset($name) ? $name->name : '';   
                },

                'filter'=>'',
                'label'=>'Name',
            ],
            
            [
                'attribute'=>'date',
                'value'=> function($model){
                    return isset($model->date) ? date('d-m-Y',strtotime($model->date)) : '';
                },
                'filter'=>'',
            ],
            [
                'attribute'=>'payable_amount',
                'filter'=>'',
            ],
            [
                'attribute'=>'amount_receive',
                'filter'=>'',
            ],
            [
                'attribute'=>'due_amount',
                'filter'=>'',
            ],
            
            
            [
                'attribute'=>'status',
                'filter'=>$status,
            ],        

    ];

   
?>
    <br><br><br>
    <div class="panel panel-body bod" >
        <div class="panel-heading head rot" >
           <span class="fa fa-money" style="font-size: 30px"> &nbsp; </span> Showing Monthly-Fee Details
        </div>
        <p>
            <?php
             echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_EXCEL => false,
                ],
            ]) 
            ?>
        </p>
     <br><br>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' =>['class' => 'table table-striped'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            
            [
                'attribute'=>'registration_id',
                'label'=>'Hosteller ID',
            ],
            [
                'attribute'=>'batch',
                'value'=> function($model) use($batch){
                    return isset($batch) ? $batch[$model->batch] : '';
                },

                'filter'=>$batch,
            ],
            [
                'attribute'=>'month',
                'value'=> function($model) use($month){
                    return isset($month) ? $month[$model->month] : '';
                },

                'filter'=>$month,
            ],
            
            [
                'attribute'=>'customer_id',
                'value'=>function($model) {
                    $name = Registration::find()->where(['id'=>$model->customer_id])->one();
                    return isset($name) ? $name->name : '';   
                },

                'filter'=>'',
                'label'=>'Name',
            ],
            
            [
                'attribute'=>'date',
                'value'=> function($model){
                    return isset($model->date) ? date('d-m-Y',strtotime($model->date)) : '';
                },
                'filter'=>'',
            ],
            [
                'attribute'=>'payable_amount',
                'filter'=>'',
            ],
            [
                'attribute'=>'amount_receive',
                'filter'=>'',
            ],
            [
                'attribute'=>'due_amount',
                'filter'=>'',
            ],
            
            
            // [
            //     'attribute'=>'status',
            //     'filter'=>$status,
            // ],
            [
                        'attribute'=>'status',
                        'contentOptions' => function ($model) {
                            if($model->status == "Fully Paid"){
                                return ['class'=>'label label-success','style' => 'font-style:oblique;font-size:10px;border-radius:50px 10px;box-shadow:1px 2px 3px gray;'];
                            }elseif($model->status == "Partially Paid"){
                                 return ['class'=>'label label-warning','style' => 'font-style:oblique;font-size:10px;border-radius:50px 10px;box-shadow:1px 2px 3px gray;'];
                            }else{
                                return ['class'=>'label label-danger','style' => 'font-style:oblique;font-size:10px;border-radius:50px 10px;box-shadow:1px 2px 3px gray;'];
                            }

                        },
                        'label'=>'Payment Status',
                        'filter'=>$status,
                    ],
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',

            [
                'value' => function ($model) {
                  return Html::a('Print', ['fee-counter/print', 'id' => $model->id], ['class' => 'btn btn-xs btn-primary','target'=>'_blank']);  
                            },
                            'format' => 'raw',
            ],

            [
                'value' => function ($model) {
                  return Html::a('Update', ['fee-counter/update', 'id' => $model->id], ['class' => 'btn btn-xs btn-warning popup']);  
                            },
                            'format' => 'raw',
            ],
        ],
    ]); ?>

</div>
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
      background-color:#3ea832;
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

            'header' => '<h4>Update Fee Collection</h4>',

            'id' => 'jobPop',

            'size' => 'modal-lg',
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
   
});");