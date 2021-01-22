<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monthly_fee".
 *
 * @property int $id
 * @property float $mon_fee
 * @property string $month
 * @property string $batch
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class MonthlyFee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'monthly_fee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mon_fee', 'month', 'batch', 'created_by'], 'required'],
            [['mon_fee'], 'number'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['month', 'batch'], 'string', 'max' => 255],
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
            'mon_fee' => 'Mon Fee',
            'month' => 'Month',
            'batch' => 'Batch',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
