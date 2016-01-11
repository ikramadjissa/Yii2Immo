<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventorier;

/**
 * InventorierSearch represents the model behind the search form about `frontend\models\Inventorier`.
 */
class InventorierSearch extends Inventorier
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien', 'anneeinv', 'comptage1', 'comptage2', 'comptage3'], 'integer'],
            [['obs', 'bureau', 'inventairephysic'], 'safe'],
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
        $query = Inventorier::find();

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
            'anneeinv' => $this->anneeinv,
            'comptage1' => $this->comptage1,
            'comptage2' => $this->comptage2,
            'comptage3' => $this->comptage3,
        ]);

        $query->andFilterWhere(['like', 'obs', $this->obs])
            ->andFilterWhere(['like', 'bureau', $this->bureau])
            ->andFilterWhere(['like', 'inventairephysic', $this->inventairephysic]);

        return $dataProvider;
    }


    public function searchInv($params, $code, $anneeinv)
    {
    	$query = Inventorier::find()->where(['codebien'=>$code]);
    
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
    			'anneeinv' => $this->anneeinv,
    			'comptage1' => $this->comptage1,
    			'comptage2' => $this->comptage2,
    			'comptage3' => $this->comptage3,
    			]);
    
    	$query->andFilterWhere(['like', 'obs', $this->obs])
    	->andFilterWhere(['like', 'bureau', $this->bureau])
    	->andFilterWhere(['like', 'inventairephysic', $this->inventairephysic]);
    
    	return $dataProvider;
    }
    
    
    public function searchInvph($params)
    {
    	$query = Inventorier::find()->where(['inventairephysic'=>'1']);
    
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
    			'anneeinv' => $this->anneeinv,
    			'comptage1' => $this->comptage1,
    			'comptage2' => $this->comptage2,
    			'comptage3' => $this->comptage3,
    			]);
    
    	$query->andFilterWhere(['like', 'obs', $this->obs])
    	->andFilterWhere(['like', 'bureau', $this->bureau])
    	->andFilterWhere(['like', 'inventairephysic', $this->inventairephysic]);
    
    	return $dataProvider;
    }
    
    
}
