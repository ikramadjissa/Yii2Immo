<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\comptecomptableamort;

/**
 * comptecomptableamortSearch represents the model behind the search form about `frontend\models\comptecomptableamort`.
 */
class comptecomptableamortSearch extends comptecomptableamort
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecomptecomptable'], 'integer'],
            [['designationcomptecomptable', 'comptecomptableref', 'designationccref', 'type'], 'safe'],
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
        $query = comptecomptableamort::find();

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
            'codecomptecomptable' => $this->codecomptecomptable,
        ]);

        $query->andFilterWhere(['like', 'designationcomptecomptable', $this->designationcomptecomptable])
            ->andFilterWhere(['like', 'comptecomptableref', $this->comptecomptableref])
            ->andFilterWhere(['like', 'designationccref', $this->designationccref])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
