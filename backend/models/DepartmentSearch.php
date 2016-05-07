<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Department;

/**
 * DepartmentSearch represents the model behind the search form about `backend\models\Department`.
 */
class DepartmentSearch extends Department
{
    public function rules()
    {
        return [
            [['depart_id', 'depart_group_id'], 'integer'],
            [['depart_name','departgroup'], 'safe'],
            [['create_date', 'modify_date'], 'safe'],
            [['created_by','updated_by'], 'integer']
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Department::find();
        $query->joinWith(['departgroup']);
        
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination'=>[
            'pageSize'=>10
        ]
        ]);
    // สำหรับ coluumn departgroupname
        $dataProvider->sort->attributes['departgroup'] = [
            'asc' => ['departgroup.depart_group_name' => SORT_ASC],
            'desc' => ['departgroup.depart_group_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'depart_id' => $this->depart_id,
            'depart_group_id' => $this->depart_group_id,
        ]);

        $query->andFilterWhere(['like', 'depart_group_id', $this->depart_group_id])
              ->andFilterWhere(['like', 'depart_name', $this->depart_name]);

        return $dataProvider;
    }
}
