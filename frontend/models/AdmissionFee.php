<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admission_fee".
 *
 * @property int $id
 * @property float $fee
 * @property string $batch
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class AdmissionFee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admission_fee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fee', 'batch', 'created_by'], 'required'],
            [['fee'], 'number'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['batch'], 'string', 'max' => 225],
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
            'fee' => 'Fee',
            'batch' => 'Batch',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
