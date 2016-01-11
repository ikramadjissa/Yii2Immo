<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\transfererrefinvamort;

/**
 * transfererrefinvamortSearch represents the model behind the search form about `frontend\models\transfererrefinvamort`.
 */
class transfererrefinvamortSearch extends Transfererrefinvamort
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecomptecomptable', 'dat', 'codecomptecomptableref', 'mnt'], 'safe'],
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
        $query = Transfererrefinvamort::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'codecomptecomptable', $this->codecomptecomptable])
            ->andFilterWhere(['like', 'dat', $this->dat])
            ->andFilterWhere(['like', 'codecomptecomptableref', $this->codecomptecomptableref])
            ->andFilterWhere(['like', 'mnt', $this->mnt]);

        return $dataProvider;
    }
    
    
    public function searchRef($params, $codec, $codecref,$datee)
    {
    	$query = Transfererrefinvamort::find()->where(['codecomptecomptable'=>$codec,'codecomptecomptableref'=>$codecref, 'dat' => $datee,]);
    	  $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'codecomptecomptable', $this->codecomptecomptable])
            ->andFilterWhere(['like', 'dat', $this->dat])
            ->andFilterWhere(['like', 'codecomptecomptableref', $this->codecomptecomptableref])
            ->andFilterWhere(['like', 'mnt', $this->mnt]);

        return $dataProvider;
     }
    
}
