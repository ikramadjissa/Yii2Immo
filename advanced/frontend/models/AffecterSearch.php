<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Affecter;

/**
 * AffecterSearch represents the model behind the search form about `app\models\Affecter`.
 */
class AffecterSearch extends Affecter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien'], 'number'],
            [['codebureau', 'dt'], 'safe'],
            [['numAffectation'], 'integer'],
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
        $query = Affecter::find();

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
            'numAffectation' => $this->numAffectation,
        ]);

        $query->andFilterWhere(['like', 'codebureau', $this->codebureau])
            ->andFilterWhere(['like', 'dt', $this->dt])
           ;

        return $dataProvider;
    }
    
    /////////////////////////////////////////////////////////////////////////////////////:
    
    
    public function searchHistorique($params,$id)
    {
    	$query = Affecter::find()->where(['codebien' => $id]);
    
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
    			'numAffectation' => $this->numAffectation,
    			]);
    
    	$query->andFilterWhere(['like', 'codebureau', $this->codebureau])
    	->andFilterWhere(['like', 'dt', $this->dt])
    	;
    
    	return $dataProvider;
    }
    
    
    
    
    
    /**** SIM***********************/

    /*   rechercher les biens affect��s et qu'on va reformer*/
    
    public function searchCod($params, $code)
    {
    	$query = Affecter::find()->where(['codebien'=>$code]);
    
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
    			'numAffectation' => $this->numAffectation,
    			]);
    
    	$query->andFilterWhere(['like', 'codebureau', $this->codebureau])
    	->andFilterWhere(['like', 'dt', $this->dt])
    	;
    
    	return $dataProvider;
    }
    
    
    /*   rechercher les biens affect��s et qu'on va reformer*/
    
    public function searchCodbur($params, $code)
    {
    	$query = Affecter::find()->where(['codebureau'=>$code]);
    
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
    			'numAffectation' => $this->numAffectation,
    			]);
    
    	$query->andFilterWhere(['like', 'codebureau', $this->codebureau])
    	->andFilterWhere(['like', 'dt', $this->dt])
    	;
    
    	return $dataProvider;
    }
    
    
}
