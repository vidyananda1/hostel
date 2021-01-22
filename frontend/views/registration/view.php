<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Registration */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="registration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'reg_id',
            'name',
            'phone',
            'address',
            'father_name',
            'mother_name',
            'aadhaar',
            'amount_payable',
            'discount',
            'discount_cat',
            'paid_amount',
            'due_amount',
            'date',
            'status',
            'created_by',
            'created_date',
            'updated_by',
            'updated_date',
            'record_status',
        ],
    ]) ?>

</div>
