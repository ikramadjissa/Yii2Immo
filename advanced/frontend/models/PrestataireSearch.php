<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prestataire;

/**
 * PrestataireSearch represents the model behind the search form about `app\models\Prestataire`.
 */
class PrestataireSearch extends Prestataire
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_reg', 'designation', 'adresse', 'tel', 'fax', 'email', 'natureprestation'], 'safe'],
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
        $query = Prestataire::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'num_reg', $this->num_reg])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'adresse', $this->adresse])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'natureprestation', $this->natureprestation]);

        return $dataProvider;
    }
}
