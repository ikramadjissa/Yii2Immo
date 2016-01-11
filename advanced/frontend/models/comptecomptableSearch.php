<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\comptecomptable;

/**
 * comptecomptableSearch represents the model behind the search form about `frontend\models\comptecomptable`.
 */
class comptecomptableSearch extends comptecomptable
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecomptecomptable', 'comptecomptableref'], 'integer'],
            [['designationcomptecomptable', 'type'], 'safe'],
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
    public function searchC($params)
    {
        $query = comptecomptable::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'codecomptecomptable' => $this->codecomptecomptable,
            'comptecomptableref' => $this->comptecomptableref,
        ]);

        $query->andFilterWhere(['like', 'designationcomptecomptable', $this->designationcomptecomptable])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }



    public function search($params, $idcc)
    {
        $query = Comptecomptable::find()->where(['codecomptecomptable'=>$idcc]);
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	$query->andFilterWhere([
    			'codecomptecomptable' => $this->codecomptecomptable,
    			'comptecomptableref' => $this->comptecomptableref,
    			]);
    
    	$query->andFilterWhere(['like', 'designationcomptecomptable', $this->designationcomptecomptable])
    	->andFilterWhere(['like', 'type', $this->type]);
    
    	return $dataProvider;
    }
    
}
