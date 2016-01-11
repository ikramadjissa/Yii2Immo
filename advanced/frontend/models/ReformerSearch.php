<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reformer;

/**
 * ReformerSearch represents the model behind the search form about `app\models\Reformer`.
 */
class ReformerSearch extends Reformer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datereforme', 'typereforme'], 'safe'],
            [['codebien'], 'number'],
            [['idintervenant'], 'integer'],
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
        $query = Reformer::find();

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
            //'idintervenant' => $this->idintervenant,
        ]);

        $query->andFilterWhere(['like', 'datereforme', $this->datereforme])
            ->andFilterWhere(['like', 'typereforme', $this->typereforme]);

        return $dataProvider;
    }
    
    /***************************************************historique**************************/
    public function searchHistorique($params,$id)
    {
    	$query = Reformer::find()->where(['codebien' => $id]);
    
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
    			//'idintervenant' => $this->idintervenant,
    			]);
    
    	$query->andFilterWhere(['like', 'datereforme', $this->datereforme])
    	->andFilterWhere(['like', 'typereforme', $this->typereforme]);
    
    	return $dataProvider;
    }
    
    
    
    

    /***********************************************sortir un bien *********************************************************/
    public function searchRef($params, $code)
    {
    	$query = Reformer::find()->where(['codebien'=>$code]);
    
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
    			'prixvente' => $this->prixvente,
    			]);
    
    	$query->andFilterWhere(['like', 'titre', $this->titre])
    	->andFilterWhere(['like', 'typereforme', $this->typereforme])
    	->andFilterWhere(['like', 'datereforme', $this->datereforme])
    	->andFilterWhere(['like', 'booleann', $this->booleann]);
    
    	return $dataProvider;
    }
    
    
    /**
     * recherche selon l annee de reforme
     */
    
    public function searchRefann($params, $code)
    {
    	$query = Reformer::find()->where(['datereforme'=>$code]);
    	 
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
    			'prixvente' => $this->prixvente,
    			]);
    	 
    	$query->andFilterWhere(['like', 'titre', $this->titre])
    	->andFilterWhere(['like', 'typereforme', $this->typereforme])
    	->andFilterWhere(['like', 'datereforme', $this->datereforme])
    	->andFilterWhere(['like', 'booleann', $this->booleann]);
    	 
    	return $dataProvider;
    }
     
    
    
    
    
    
    
    
    
    
    /*
     * Rechercher selon booleann
    *
    * */
    
    public function searchRefbool($params, $bool)
    {
    	$query = Reformer::find()->where(['booleann'=>$bool]);
    
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
    			'prixvente' => $this->prixvente,
    			]);
    
    	$query->andFilterWhere(['like', 'titre', $this->titre])
    	->andFilterWhere(['like', 'typereforme', $this->typereforme])
    	->andFilterWhere(['like', 'datereforme', $this->datereforme])
    	->andFilterWhere(['like', 'booleann', $this->booleann]);
    
    	return $dataProvider;
    }
    
    
    
    
    
    
    
    
    /*                                liste des biens réformés                                          */
    
    public function searchListeReforme($params)
    {
    	$query = Reformer::find();
    
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
    			'prixvente' => $this->prixvente,
    			]);
    
    	$query->andFilterWhere(['like', 'titre', $this->titre])
    	->andFilterWhere(['like', 'typereforme', $this->typereforme])
    	->andFilterWhere(['like', 'datereforme', $this->datereforme])
    	->andFilterWhere(['like', 'booleann', $this->booleann]);
    
    	return $dataProvider;
    }
    
    
    
    
}
