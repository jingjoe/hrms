<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Risk;

/**
 * RiskSearch represents the model behind the search form about `frontend\models\Risk`.
 */
class RiskSearch extends Risk
{
    public $storename;
    public function rules()
    {
        return [
            [['id', 'riskstore_id', 'location_id', 'type_id', 'group_id', 'created_by', 'updated_by'], 'integer'],
            [['date_report', 'time_report', 'period', 'depart_group_id', 'depart_id', 'more_detail', 'risklevel_id',
              'level_warning', 'act', 'problem_basic', 'image', 'create_date', 'modify_date','storename','locationname',
              'levelname','typename','loginname'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Risk::find();
        $query->joinWith(['riskstore']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>10
            ]
        ]);
   
// Sorting ความเสี่ยงที่อยู่ในระบบ
        $dataProvider->sort->attributes['storename'] = [
       'asc' => ['riskstore.name' => SORT_ASC],
       'desc' => ['riskstore.name' => SORT_DESC],
       'default' => SORT_ASC
    ];
// Sorting สถานที่เกตุเหตุ
        $dataProvider->sort->attributes['locationname'] = [
       'asc' => ['location_id' => SORT_ASC],
       'desc' => ['location_id' => SORT_DESC],
       'default' => SORT_ASC
    ];
// Sorting ระดับความเสี่ยง
        $dataProvider->sort->attributes['levelname'] = [
       'asc' => ['risklevel_id' => SORT_ASC],
       'desc' => ['risklevel_id' => SORT_DESC],
       'default' => SORT_ASC
    ];
// Sorting ประเภทความเสี่ยง
        $dataProvider->sort->attributes['typename'] = [
       'asc' => ['type_id' => SORT_ASC],
       'desc' => ['type_id' => SORT_DESC],
       'default' => SORT_ASC
    ];
// Sorting ผู้รายงานความเสี่ยง
        $dataProvider->sort->attributes['loginname'] = [
       'asc' => ['created_by' => SORT_ASC],
       'desc' => ['created_by' => SORT_DESC],
       'default' => SORT_ASC
    ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date_report' => $this->date_report,
            'time_report' => $this->time_report,
            'riskstore_id' => $this->riskstore_id,
            'location_id' => $this->location_id,
            'type_id' => $this->type_id,
            'group_id' => $this->group_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'create_date' => $this->create_date,
            'modify_date' => $this->modify_date,
        ]);
        
        $query->andFilterWhere(['like', 'period', $this->period])
            ->andFilterWhere(['like', 'depart_group_id', $this->depart_group_id])
            ->andFilterWhere(['like', 'depart_id', $this->depart_id])
            ->andFilterWhere(['like', 'more_detail', $this->more_detail])
            ->andFilterWhere(['like', 'risklevel_id', $this->risklevel_id])
            ->andFilterWhere(['like', 'level_warning', $this->level_warning])
            ->andFilterWhere(['like', 'act', $this->act])
            ->andFilterWhere(['like', 'problem_basic', $this->problem_basic])
            ->andFilterWhere(['like', 'riskstore.name', $this->storename])  
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
