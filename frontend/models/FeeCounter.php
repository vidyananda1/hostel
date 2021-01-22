<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fee_counter".
 *
 * @property int $id
 * @property string $customer_id
 * @property string $registration_id
 * @property string $month
 * @property float $payable_amount
 * @property string|null $dis_cat
 * @property string|null $discount
 * @property float|null $amount_receive
 * @property float|null $due_amount
 * @property string $date
 * @property string $status
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class FeeCounter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fee_counter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'registration_id', 'month', 'payable_amount', 'date', 'status', 'created_by','batch'], 'required'],
            [['payable_amount', 'amount_receive', 'due_amount'], 'number'],
            [['date', 'created_date', 'updated_date'], 'safe'],
            [['status'], 'string'],
            [['customer_id','created_by', 'updated_by'], 'integer'],
            [[ 'registration_id', 'month','batch'], 'string', 'max' => 255],
            [['record_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'registration_id' => 'Registration ID',
            'month' => 'Month',
            'payable_amount' => 'Payable Amount',
            'amount_receive' => 'Amount Receive',
            'due_amount' => 'Due Amount',
            'date' => 'Date',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
        ];
    }
}
