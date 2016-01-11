<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\comptecomptableref;

/**
 * comptecomptablerefSearch represents the model behind the search form about `frontend\models\comptecomptableref`.
 */
class comptecomptablerefSearch extends comptecomptableref
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecompteref'], 'integer'],
            [['designation'], 'safe'],
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
        $query = comptecomptableref::find();

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
            'codecompteref' => $this->codecompteref,
        ]);

        $query->andFilterWhere(['like', 'designation', $this->designation]);

        return $dataProvider;
    }
}
