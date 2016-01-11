<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exerciceinventaire;

/**
 * ExerciceinventaireSearch represents the model behind the search form about `frontend\models\Exerciceinventaire`.
 */
class ExerciceinventaireSearch extends Exerciceinventaire
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anneeinv', 'seuil_compte'], 'number'],
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
        $query = Exerciceinventaire::find();

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
            'anneeinv' => $this->anneeinv,
            'seuil_compte' => $this->seuil_compte,
        ]);

        return $dataProvider;
    }
}
