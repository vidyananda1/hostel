<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "month".
 *
 * @property int $id
 * @property string $month_name
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Month extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'month';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['month_name', 'created_by'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['month_name'], 'string', 'max' => 255],
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
            'month_name' => 'Month Name',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
