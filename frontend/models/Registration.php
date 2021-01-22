<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registration".
 *
 * @property int $id
 * @property string $reg_id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $father_name
 * @property string $mother_name
 * @property string $aadhaar
 * @property int $amount_payable
 * @property string|null $discount
 * @property string|null $discount_cat
 * @property int $paid_amount
 * @property float|null $due_amount
 * @property string $date
 * @property string $status
 * @property int $created_by
 * @property string $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string $record_status
 */
class Registration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_id', 'name', 'phone', 'address', 'father_name', 'mother_name', 'aadhaar', 'amount_payable', 'paid_amount', 'date', 'status', 'created_by','batch','admission_fee'], 'required'],
            [['amount_payable', 'paid_amount', 'created_by', 'updated_by'], 'integer'],
            [['due_amount','admission_fee'], 'number'],
            [['date', 'created_date', 'updated_date'], 'safe'],
            [['status'], 'string'],
            [['reg_id', 'name', 'address', 'father_name', 'mother_name', 'discount', 'discount_cat','batch'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 10],
            [['aadhaar'], 'string', 'max' => 12],
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
            'reg_id' => 'Reg ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'father_name' => 'Father Name',
            'mother_name' => 'Mother Name',
            'aadhaar' => 'Aadhaar',
            'amount_payable' => 'Amount Payable',
            'discount' => 'Discount',
            'discount_cat' => 'Discount Cat',
            'paid_amount' => 'Paid Amount',
            'due_amount' => 'Due Amount',
            'date' => 'Date',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'record_status' => 'Record Status',
            'batch'=>'Batch',
            'admission_fee'=>'Admission Fee',
        ];
    }
}
