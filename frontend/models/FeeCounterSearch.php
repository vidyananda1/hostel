<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FeeCounter;

/**
 * FeeCounterSearch represents the model behind the search form of `app\models\FeeCounter`.
 */
class FeeCounterSearch extends FeeCounter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id','id', 'created_by', 'updated_by','batch'], 'integer'],
            [[ 'registration_id', 'month', 'date', 'status', 'created_date', 'updated_date', 'record_status','batch'], 'safe'],
            [['payable_amount', 'amount_receive', 'due_amount'], 'number'],
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
        $query = FeeCounter::find();

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
            'customer_id' => $this->customer_id,
            'payable_amount' => $this->payable_amount,
            'amount_receive' => $this->amount_receive,
            'due_amount' => $this->due_amount,
            'date' => $this->date,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
            'batch' => $this->batch,
        ]);

        $query
            ->andFilterWhere(['like', 'registration_id', $this->registration_id])
            ->andFilterWhere(['like', 'month', $this->month])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'record_status', $this->record_status]);

        return $dataProvider;
    }
}
