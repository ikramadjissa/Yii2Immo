<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Intervenant;

/**
 * IntervenantSearch represents the model behind the search form about `frontend\models\Intervenant`.
 */
class IntervenantSearch extends Intervenant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typeinter', 'titre', 'adresse', 'mail', 'tel'], 'safe'],
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
        $query = Intervenant::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'typeinter', $this->typeinter])
            ->andFilterWhere(['like', 'titre', $this->titre])
            ->andFilterWhere(['like', 'adresse', $this->adresse])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'tel', $this->tel]);

        return $dataProvider;
    }
    
    public function searchinter($params, $id)
    {
    	$query = Intervenant::find()->where(['titre'=>$id]);;
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	
    
    	$query->andFilterWhere(['like', 'typeinter', $this->typeinter])
    	->andFilterWhere(['like', 'titre', $this->titre])
    	->andFilterWhere(['like', 'adresse', $this->adresse])
    	->andFilterWhere(['like', 'mail', $this->mail])
    	->andFilterWhere(['like', 'tel', $this->tel]);
    
    	return $dataProvider;
    }
    
    /*                                               Intervenant Cession                                                 */
    
    public function searchintercession($params, $typr)
    {
    	$query = Intervenant::find()->where(['typeinter'=>$typr]);;
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	
    	$query->andFilterWhere(['like', 'typeinter', $this->typeinter])
    	->andFilterWhere(['like', 'titre', $this->titre])
    	->andFilterWhere(['like', 'adresse', $this->adresse])
    	->andFilterWhere(['like', 'mail', $this->mail])
    	->andFilterWhere(['like', 'tel', $this->tel]);
    
    	return $dataProvider;
    }
    
}
