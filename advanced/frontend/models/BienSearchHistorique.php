<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bien;
use app\models\Dat;

/**
 * BienSearch represents the model behind the search form about `app\models\Bien`.
 */
class BienSearchHistorique extends Bien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien', 'prixachat', 'tauxamort', 'poids'], 'number'],
            [['codesousfamille', 'numfacture', 'numcmd', 'dureevie'], 'integer'],
            [['typebien', 'designationbien', 'dateacquisition', 'statutbien', 'etatbien', 'typeamort', 'commentaire', 'datedebugarantie'], 'safe'],
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
    public function search($params, $id)
    {
    
        $query = Bien::find()->where(['codebien' => $id]);
      
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
            'codebien' => $this->codebien,
            'codesousfamille' => $this->codesousfamille,
            'numfacture' => $this->numfacture,
            'numcmd' => $this->numcmd,
            
            'prixachat' => $this->prixachat,
            'tauxamort' => $this->tauxamort,
            'dureevie' => $this->dureevie,
            'poids' => $this->poids,
           
        ]);

        $query->andFilterWhere(['like', 'typebien', $this->typebien])
            ->andFilterWhere(['like', 'designationbien', $this->designationbien])
            ->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
            ->andFilterWhere(['like', 'statutbien', $this->statutbien])
            ->andFilterWhere(['like', 'etatbien', $this->etatbien])
            ->andFilterWhere(['like', 'typeamort', $this->typeamort])
            ->andFilterWhere(['like', 'commentaire', $this->commentaire])
            ->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie]);

        return $dataProvider;
    }
}
