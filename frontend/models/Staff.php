<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string $staff_name
 * @property string $phone
 * @property string $address
 * @property int $user_id
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_name', 'phone', 'address', 'user_id', 'created_by'], 'required'],
            [['user_id', 'created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['staff_name', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 10],
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
            'staff_name' => 'Staff Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'user_id' => 'User ID',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}