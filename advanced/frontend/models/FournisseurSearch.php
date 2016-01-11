<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fournisseur;

/**
 * FournisseurSearch represents the model behind the search form about `app\models\Fournisseur`.
 */
class FournisseurSearch extends Fournisseur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['regcomm', 'designation', 'adressfourn', 'telfourn', 'fax'], 'safe'],
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
        $query = Fournisseur::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'regcomm', $this->regcomm])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'adressfourn', $this->adressfourn])
            ->andFilterWhere(['like', 'telfourn', $this->telfourn])
            ->andFilterWhere(['like', 'fax', $this->fax]);

        return $dataProvider;
    }
}
