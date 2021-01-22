<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discount_cat".
 *
 * @property int $id
 * @property string $dis_cat_name
 * @property int $created_by
 * @property string $created_date
 * @property string $record_status
 */
class DiscountCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dis_cat_name', 'created_by'], 'required'],
            [['created_by'], 'integer'],
            [['created_date'], 'safe'],
            [['dis_cat_name'], 'string', 'max' => 255],
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
            'dis_cat_name' => 'Dis Cat Name',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'record_status' => 'Record Status',
        ];
    }
}
