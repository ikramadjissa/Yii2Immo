<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transfererrefinv;

/**
 * TransfererrefinvSearch represents the model behind the search form about `frontend\models\Transfererrefinv`.
 */
class TransfererrefinvSearch extends Transfererrefinv
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecomptecomptable', 'codecomptecomptableref', 'mnt'], 'integer'],
            [['dat'], 'safe'],
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
        $query = Transfererrefinv::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate())
        {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'codecomptecomptable' => $this->codecomptecomptable,
            'codecomptecomptableref' => $this->codecomptecomptableref,
            'mnt' => $this->mnt,
        ]);

        $query->andFilterWhere(['like', 'dat', $this->dat]);

        return $dataProvider;
    }
    
    
    
    public function searchRef($params, $codec, $codecref,$datee)
    {
    	$query = transfererrefinv::find()->where(['codecomptecomptable'=>$codec,'codecomptecomptableref'=>$codecref, 'dat' => $datee,]);
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
    			'codecomptecomptableref' => $this->codecomptecomptableref,
    			'mnt' => $this->mnt,
    			]);
    
    	$query->andFilterWhere(['like', 'dat', $this->dat]);
    
    	return $dataProvider;
    }
    
    
}
