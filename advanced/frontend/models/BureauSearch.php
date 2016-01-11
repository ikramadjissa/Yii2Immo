<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bureau;

/**
 * BureauSearch represents the model behind the search form about `frontend\models\Bureau`.
 */
class BureauSearch extends Bureau
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebureau', 'codestructure', 'designationbureau'], 'safe'],
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
        $query = Bureau::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'codebureau', $this->codebureau])
            ->andFilterWhere(['like', 'codestructure', $this->codestructure])
            ->andFilterWhere(['like', 'designationbureau', $this->designationbureau]);

        return $dataProvider;
    }
    
    
    /*                 recherche selon le code d un bien                                     */
    public function searchCod($params, $code)
    {  
    	
    
    	$query = Bureau::find()->where(['codebureau'=>$code]);
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    	
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	$query->andFilterWhere(['like', 'codebureau', $this->codebureau])
    	->andFilterWhere(['like', 'codestructure', $this->codestructure])
    	->andFilterWhere(['like', 'designationbureau', $this->designationbureau]);
    
    	return $dataProvider;
    }
    
    
    
    
    public function searchCodstr($params, $code)
    {
    	$query = Bureau::find()->where(['codestructure'=>$code]);
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    	
    	$modelsbur=$dataProvider->getModels();
    	foreach ($modelsbur as $rowbur)
    	{
    		echo $rowbur->codestructure;
    		
    	}
    	
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	$query->andFilterWhere(['like', 'codestructure', $this->codestructure])
    	->andFilterWhere(['like', 'codestructure', $this->codestructure])
    	->andFilterWhere(['like', 'designationbureau', $this->designationbureau]);
    
    	return $dataProvider;
    }
}
