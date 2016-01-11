<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Famille;

/**
 * FamilleSearch represents the model behind the search form about `frontend\models\Famille`.
 */
class FamilleSearch extends Famille
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codefamille', 'codecomptecomptable'], 'integer'],
            [['designationfamille'], 'safe'],
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
    public function searchF($params, $idF)
    {
        $query = Famille::find()->where(['codecomptecomptable'=>$idF]);

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
            'codefamille' => $this->codefamille,
            'codecomptecomptable' => $this->codecomptecomptable,
        ]);

        $query->andFilterWhere(['like', 'designationfamille', $this->designationfamille]);

        return $dataProvider;
    }

    public function searchFC($params, $idF)
    {
    	$query = Famille::find()->where(['codefamille'=>$idF]);
    
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
    			'codefamille' => $this->codefamille,
    			'codecomptecomptable' => $this->codecomptecomptable,
    			]);
    
    	$query->andFilterWhere(['like', 'designationfamille', $this->designationfamille]);
    
    	return $dataProvider;
    }
    
    
}
