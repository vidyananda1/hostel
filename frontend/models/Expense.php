<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expense".
 *
 * @property int $id
 * @property string $ex_name
 * @property string $date
 * @property float $amount
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Expense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expense';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ex_name', 'date', 'amount', 'created_by'], 'required'],
            [['date', 'created_date'], 'safe'],
            [['amount'], 'number'],
            [['created_by'], 'integer'],
            [['ex_name'], 'string', 'max' => 255],
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
            'ex_name' => 'Ex Name',
            'date' => 'Date',
            'amount' => 'Amount',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
