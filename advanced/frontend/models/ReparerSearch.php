<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reparer;

/**
 * ReparerSearch represents the model behind the search form about `app\models\Reparer`.
 */
class ReparerSearch extends Reparer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien'], 'number'],
            [['num_reg', 'dt', 'datefin', 'motif'], 'safe'],
            [[ 'numreparation'], 'integer'],
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
        $query = Reparer::find();

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
            'numreparation' => $this->numreparation,
        ]);

        $query->andFilterWhere(['like', 'num_reg', $this->num_reg])
            ->andFilterWhere(['like', 'dt', $this->dt])
            ->andFilterWhere(['like', 'datefin', $this->datefin])
            ->andFilterWhere(['like', 'motif', $this->motif]);

        return $dataProvider;
    }
    public function searchHistorique($params,$id)
    {
    	$query = Reparer::find()->where(['codebien' => $id]);
    
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
    			'numreparation' => $this->numreparation,
    			]);
    
    	$query->andFilterWhere(['like', 'num_reg', $this->num_reg])
    	->andFilterWhere(['like', 'dt', $this->dt])
    	->andFilterWhere(['like', 'datefin', $this->datefin])
    	->andFilterWhere(['like', 'motif', $this->motif]);
    
    	return $dataProvider;
    }
}
