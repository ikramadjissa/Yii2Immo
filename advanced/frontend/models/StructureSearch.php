<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Structure;

/**
 * StructureSearch represents the model behind the search form about `frontend\models\Structure`.
 */
class StructureSearch extends Structure
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codestructure', 'codestructure_struct_chef', 'typestructure', 'adressestruct', 'designation'], 'safe'],
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
        $query = Structure::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'codestructure', $this->codestructure])
            ->andFilterWhere(['like', 'codestructure_struct_chef', $this->codestructure_struct_chef])
            ->andFilterWhere(['like', 'typestructure', $this->typestructure])
            ->andFilterWhere(['like', 'adressestruct', $this->adressestruct])
            ->andFilterWhere(['like', 'designation', $this->designation]);

        return $dataProvider;
    }
    
    /*  recherche selon le code  */
    
    
    public function searchCod($params, $code)
    {
    	$query = Structure::find()->where(['codestructure'=>$code]);
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	$query->andFilterWhere(['like', 'codestructure', $this->codestructure])
    	->andFilterWhere(['like', 'codestructure_struct_chef', $this->codestructure_struct_chef])
    	->andFilterWhere(['like', 'typestructure', $this->typestructure])
    	->andFilterWhere(['like', 'adressestruct', $this->adressestruct])
    	->andFilterWhere(['like', 'designation', $this->designation]);
    
    	return $dataProvider;
    }
    
    
    
    /*  recherche selon le code  */
    
    
    public function searchCodtype($params, $code)
    {
    	$query = Structure::find()->where(['codestructure'=>$code, 'typestructure'=>['siege','succursale']]);
 
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	$query->andFilterWhere(['like', 'codestructure', $this->codestructure])
    	->andFilterWhere(['like', 'codestructure_struct_chef', $this->codestructure_struct_chef])
    	->andFilterWhere(['like', 'typestructure', $this->typestructure])
    	->andFilterWhere(['like', 'adressestruct', $this->adressestruct])
    	->andFilterWhere(['like', 'designation', $this->designation]);
    
    	return $dataProvider;
    }
}
