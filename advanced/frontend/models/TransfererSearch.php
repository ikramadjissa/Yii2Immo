<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transferer;

/**
 * TransfererSearch represents the model behind the search form about `frontend\models\Transferer`.
 */
class TransfererSearch extends Transferer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien'], 'number'],
            [['dt', 'codebureau', 'motif'], 'safe'],
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
        $query = Transferer::find();

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
            'codebien' => $this->codebien,
        ]);

        $query->andFilterWhere(['like', 'dt', $this->dt])
            ->andFilterWhere(['like', 'codebureau', $this->codebureau])
            ->andFilterWhere(['like', 'motif', $this->motif]);

        return $dataProvider;
    }
    
    public function searchHistorique($params, $id)
    {
    	$query = Transferer::find()->where(['codebien' => $id]);
    
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
    			'codebien' => $this->codebien,
    			]);
    
    	$query->andFilterWhere(['like', 'dt', $this->dt])
    	->andFilterWhere(['like', 'codebureau', $this->codebureau])
    	->andFilterWhere(['like', 'motif', $this->motif]);
    
    	return $dataProvider;
    }
}
