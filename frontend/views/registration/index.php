<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use app\models\Batch;
use app\models\DiscountCat;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Registrations';
// $this->params['breadcrumbs'][] = $this->title;
$batch= ArrayHelper::map(Batch::find()->all(), 'id', 'batch_name');
$dis= ArrayHelper::map(DiscountCat::find()->all(), 'id', 'dis_cat_name');
$pay=[ 'Fully Paid' => 'Fully Paid', 'Partially Paid' => 'Partially Paid', 'Not Paid' => 'Not Paid' ];
?>
<div class="registration-index">
    <br><br>
    <p>
        <?= Html::a('Add Hosteller', ['create'], ['class' => 'btn btn-primary popup']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
     <?php  

    $gridColumns = [
            //'id',
            'reg_id',
            'phone',
            'aadhaar',
            //'batch',
            //'name',
            [
                'attribute'=>'batch',
                'filter'=>'',
                'value' => function ($model) use($batch){
                        return isset($model->batch) ? $batch[$model->batch] : ' ';
                    },
            ],
            [
                'attribute'=>'name',
                'filter'=>'',
            ],
            
            [
                'attribute'=>'address',
                'filter'=>'',
            ],
            [
                'attribute'=>'father_name',
                'filter'=>'',
            ],
            [
                'attribute'=>'mother_name',
                'filter'=>'',
            ],
            [
                'attribute'=>'date',
                'filter'=>'',
                'value' => function ($model) {
                        return isset($model->date) ? date('d-m-Y',strtotime($model->date)) : ' ';
                    },
            ],
            'amount_payable',
            'discount',
            //'discount_cat',
            [
                'attribute'=>'discount_cat',
                'filter'=>'',
                'value' => function ($model) use($dis){
                        return isset($model->discount_cat) ? $dis[$model->discount_cat] : ' ';
                    },
            ],
            
            [
                'attribute'=>'paid_amount',
                'filter'=>'',
            ],
            [
                'attribute'=>'due_amount',
                'filter'=>'',
            ],
            
            //'status',
            // [
            //     'attribute'=> 'status',
            //     'filter'=>$pay,
            // ],
        
            'status',
                        
        
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',

            

    ];

   
?>
    <br><br><br>
    <div class="panel panel-body bod " >
        <div class="panel-heading head rot" >
            <span class="glyphicon glyphicon-list-alt">&nbsp;</span> Showing Registration Details
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
                'attribute'=>'name',
                'filter'=>'',
            ],
            //'reg_id',
            [
                'attribute'=>'date',
                'filter'=>'',
                'value' => function ($model) {
                        return isset($model->date) ? date('d-m-Y',strtotime($model->date)) : ' ';
                    },
            ],

             [
                'attribute'=>'batch',
                
                'value' => function ($model) use($batch){
                        return isset($model->batch) ? $batch[$model->batch] : ' ';
                    },

                'filter'=> $batch,

            ],

            [
                'attribute'=>'reg_id',
                'label'=>'Hosteller ID',
            ],
            
            'phone',
            'aadhaar',
            //'name',
            'address',
           
            
            // [
            //     'attribute'=>'address',
            //     'filter'=>'',
            // ],
            // [
            //     'attribute'=>'father_name',
            //     'filter'=>'',
            // ],
            // [
            //     'attribute'=>'mother_name',
            //     'filter'=>'',
            // ],
           
            //'amount_payable',
            //'discount',
            //'discount_cat',
            
            // [
            //     'attribute'=>'paid_amount',
            //     'filter'=>'',
            // ],
            // [
            //     'attribute'=>'due_amount',
            //     'filter'=>'',
            // ],
            
            //'status',
            // [
            //     'attribute'=> 'status',
            //     'filter'=>$pay,
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
                        'filter'=>$pay,
                    ],
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',

             [
                'value' => function ($model) {
                  return Html::a('Print', ['registration/print', 'id' => $model->id], ['class' => 'btn btn-xs btn-primary','target'=>'_blank']);  
                            },
                            'format' => 'raw',
            ],
            [
                'value' => function ($model) {
                  return Html::a('Monthly Fee', ['fee-counter/create', 'id' => $model->reg_id], ['class' => 'btn btn-xs btn-danger popup2']);  
                            },
                            'format' => 'raw',
            ],
            [
                'value' => function ($model) {
                  return Html::a('Update', ['registration/update', 'id' => $model->id], ['class' => 'btn btn-xs btn-warning popup1']);  
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
      background-color:#188a94;
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

            'header' => '<h4>Enter Registration Details</h4>',

            'id' => 'jobPop',

            'size' => 'modal-lg',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
            


        ]);


       

        Modal::end();

Modal::begin([

            'header' => '<h4>Update Registration Details</h4>',

            'id' => 'jobPop1',

            'size' => 'modal-lg',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
            


        ]);


       

Modal::end();

Modal::begin([

            'header' => '<h4>Collect Monthly Fee</h4>',

            'id' => 'jobPop2',

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
    $('.popup1').click(function(e) {
     e.preventDefault();
     $('#jobPop1').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });
    $('.popup2').click(function(e) {
     e.preventDefault();
     $('#jobPop2').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });
});");
