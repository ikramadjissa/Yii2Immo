<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\reforme;

/**
 * reformeSearch represents the model behind the search form about `frontend\models\reforme`.
 */
class reformeSearch extends reforme
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datereforme'], 'integer'],
            [['refpvreforme', 'numdecisionreforme', 'conclusionreforme'], 'safe'],
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
    public function search($params, $code)
    {
        $query = reforme::find()->where(['codebien'=>[''.$code]]);;

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
            'datereforme' => $this->datereforme,
        ]);

        $query->andFilterWhere(['like', 'refpvreforme', $this->refpvreforme])
            ->andFilterWhere(['like', 'numdecisionreforme', $this->numdecisionreforme])
            ->andFilterWhere(['like', 'conclusionreforme', $this->conclusionreforme]);

        return $dataProvider;
    }
}
