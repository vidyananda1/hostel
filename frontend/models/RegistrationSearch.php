<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Registration;

/**
 * RegistrationSearch represents the model behind the search form of `app\models\Registration`.
 */
class RegistrationSearch extends Registration
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'amount_payable', 'paid_amount', 'created_by', 'updated_by'], 'integer'],
            [['reg_id', 'name', 'phone', 'address', 'father_name', 'mother_name', 'aadhaar', 'discount', 'discount_cat', 'date', 'status', 'created_date', 'updated_date', 'record_status','batch'], 'safe'],
            [['due_amount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Registration::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'amount_payable' => $this->amount_payable,
            'paid_amount' => $this->paid_amount,
            'due_amount' => $this->due_amount,
            'date' => $this->date,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
            'batch' => $this->batch,
        ]);

        $query->andFilterWhere(['like', 'reg_id', $this->reg_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'mother_name', $this->mother_name])
            ->andFilterWhere(['like', 'aadhaar', $this->aadhaar])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'discount_cat', $this->discount_cat])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
