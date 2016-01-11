<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ville;

/**
 * VilleSearch represents the model behind the search form about `app\models\Ville`.
 */
class VilleSearch extends Ville
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nom', 'adresse'], 'safe'],
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
        $query = Ville::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'adresse', $this->adresse]);

        return $dataProvider;
    }
}
