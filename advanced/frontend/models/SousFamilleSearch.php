<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SousFamille;

/**
 * SousFamilleSearch represents the model behind the search form about `frontend\models\SousFamille`.
 */
class SousFamilleSearch extends SousFamille
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codesousfamille', 'codefamille'], 'integer'],
            [['designationsousfamille'], 'safe'],
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
    public function search($params, $idf)
    {
        $query = SousFamille::find()->where(['codefamille'=>$idf]);

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
            'codesousfamille' => $this->codesousfamille,
            'codefamille' => $this->codefamille,
        ]);

        $query->andFilterWhere(['like', 'designationsousfamille', $this->designationsousfamille]);

        return $dataProvider;
    }
    public function searchSF($params, $idsf)
    {
    	$query = SousFamille::find()->where(['codesousfamille'=>$idsf]);
    
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
    			'codesousfamille' => $this->codesousfamille,
    			'codefamille' => $this->codefamille,
    			]);
    
    	$query->andFilterWhere(['like', 'designationsousfamille', $this->designationsousfamille]);
    
    	return $dataProvider;
    }
}
