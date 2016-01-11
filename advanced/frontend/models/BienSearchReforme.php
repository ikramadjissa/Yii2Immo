<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Bureau;

/**
 * BienSearch represents the model behind the search form about `frontend\models\Bien`.
 */
class BienSearchReforme extends Bien
{
    /**
     * @inheritdoc
     */
   
  
    public function rules()
    {
        return [
            [[ 'prixachat', 'tauxamort', 'poids', 'garantie'], 'number'],
            [['codesousfamille', 'numfacture', 'numcmd', 'dureevie'], 'integer'],
            [['codebien', 'typebien', 'designationbien', 'dateacquisition', 'statutbien', 'etatbien', 'typeamort', 'commentaire', 'datedebugarantie', 'dateenr', 'bureau.designationbureau'], 'safe'],
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
    
        $query = Bien::find()->where(['statutbien' => "areformer"]);
	//	$query->joinWith(['affecter' => function($query) { $query->from(['affecter' => 'bien']); }]);
		
        $dataProvider = new ActiveDataProvider([
        
    'query' => $query,   
        		'pagination' => [
        		'pageSize' => 10,
        		],
]);


// enable sorting for the related column
/*$dataProvider->sort->attributes['bureau.designationbureau'] = [
    'asc' => ['bureau.designationbureau' => SORT_ASC],
    'desc' => ['bureau.designationbureau' => SORT_DESC],
];*/  
	           
        $this->load($params);

        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
           // $query->where('0=1');
         
           return $dataProvider;
       }
        $query->andFilterWhere([
            'codebien' => $this->codebien,
            'codesousfamille' => $this->codesousfamille,
            'numfacture' => $this->numfacture,
            'numcmd' => $this->numcmd,
            'prixachat' => $this->prixachat,
            'tauxamort' => $this->tauxamort,
            'dureevie' => $this->dureevie,
            'poids' => $this->poids,
            'garantie' => $this->garantie,
        ]);

            $query->andFilterWhere(['like', 'typebien', $this->typebien])
            ->andFilterWhere(['like', 'designationbien', $this->designationbien])
            ->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
            ->andFilterWhere(['like', 'statutbien', $this->statutbien])
            ->andFilterWhere(['like', 'etatbien', $this->etatbien])
            ->andFilterWhere(['like', 'typeamort', $this->typeamort])
            ->andFilterWhere(['like', 'commentaire', $this->commentaire])
            ->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
            ->andFilterWhere(['like', 'dateenr', $this->dateenr]);
			//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);

        return $dataProvider;
    }

    public function searchBienReformer($params)
    {
    
    	$query = Bien::find()->where(['statutbien' => "reformer"]);
    	//	$query->joinWith(['affecter' => function($query) { $query->from(['affecter' => 'bien']); }]);
    
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 10,
    			],
    			]);
    
    
    	// enable sorting for the related column
    	/*$dataProvider->sort->attributes['bureau.designationbureau'] = [
    	 'asc' => ['bureau.designationbureau' => SORT_ASC],
    	'desc' => ['bureau.designationbureau' => SORT_DESC],
    	];*/
    
    	$this->load($params);
    
    	if (!($this->load($params) && $this->validate())) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		 
    		return $dataProvider;
    	}
    	$query->andFilterWhere([
    			'codebien' => $this->codebien,
    			'codesousfamille' => $this->codesousfamille,
    			'numfacture' => $this->numfacture,
    			'numcmd' => $this->numcmd,
    			'prixachat' => $this->prixachat,
    			'tauxamort' => $this->tauxamort,
    			'dureevie' => $this->dureevie,
    			'poids' => $this->poids,
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
}
