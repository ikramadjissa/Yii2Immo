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
class BienSearch extends Bien
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
    public function search($params)
    {
    	$date = new Dat;
        $query = Bien::find();
       // $queryDat = Dat ::find();
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
    
    
    

    /*     ----------------------      Consultation des amosrtissements par bien    -------------------------------*/
    
    public function searchConsultationBien($params , $idsf)
    {
    	$query = Bien::find()->where(['statutbien'=>['areformer','transfere','en réparation','affecte'],'codesousfamille'=>$idsf]);
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 10,
    			],
    			]);
    
    	$this->load($params);
    	if (!($this->load($params) && $this->validate())) {
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
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
    /*-------------------------------chercher bien selon le code de bien------------------------------------------------*/
    public function searchConsultationBienSelonCode($params , $idsf)
    {
    	$query = Bien::find()->where(['codebien'=>$idsf]);
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 10,
    			],
    			]);
    
    	$this->load($params);
    	if (!($this->load($params) && $this->validate())) {
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
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
    
    
    
    /*-------------------------------chercher bien selon le code de bien------------------------------------------------*/
    public function searchConsultationBienSelonCodestatut($params , $idsf)
    {
    	$query = Bien::find()->where(['statutbien'=>['areformer','transfere','en réparation','affecte'],'codebien'=>$idsf]);
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 10,
    			],
    			]);
    
    
    	return $dataProvider;
    }
    
    
    /*     ----------------------      Consultation des amosrtissements par bien reformés   -------------------------------*/
    
    public function searchConsultationBienReforme($params , $idsf)
    {
    	$query = Bien::find()->where(['codesousfamille'=>$idsf]);//'statutbien'=>['reformer'],
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 20,
    			],
    			]);
    
    	$this->load($params);
    	if (!($this->load($params) && $this->validate())) {
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
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
    
    
    /*----------------- Consultation par compte   ------------------------------------------------------------*/
    
    public function searchConsultationCompte($params)
    {
    
    	$query = Bien::find()->where(['statutbien'=>['areformer','transfere','en réparation','affecte']]);
    	//	$query->joinWith(['affecter' => function($query) { $query->from(['affecter' => 'bien']); }]);
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 10,
    			],
    			]);
    
    	$this->load($params);
    
    	if (!($this->load($params) && $this->validate())) {
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
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
    
    /*-----------------------------------------Liste des biens reformes-------------------------------------------------*/
    public function searchListeReforme($params, $code)
    {
    
    	$query = Bien::find()->where(['statutbien'=>['reformer'], 'codebien'=> $code]);
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 20,
    			],
    			]);
    
    	$this->load($params);
    
    	if (!($this->load($params) && $this->validate())) {
    		 
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
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
    
    
    
    /*-----------------------------------------Liste des biens reformes-------------------------------------------------*/
    public function searchListeReformee($params, $code)
    {
    
    	$query = Bien::find()->where(['codebien'=>$code]);
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 20,
    			],
    			]);
    
    	$this->load($params);
    
    	if (!($this->load($params) && $this->validate())) {
    		 
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
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
    
    
    
    /*********************************************************************************************************/
    
    public function searchListeReformerAll($params)
    {
    
    	$query = Bien::find()->where(['statutbien'=>['reformer']]);
    	$dataProvider = new ActiveDataProvider([
    			 
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 20,
    			],
    			]);
    
    	$this->load($params);
    
    	if (!($this->load($params) && $this->validate())) {
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
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
    /**********************pour transferer les compte d amortissement*********************************/
    
    public function searchListeReformerAllAmort($params)
    {
    
    	$query = Bien::find()->where(['statutbien'=>['reformer','reformertransf']]);
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 20,
    			],
    			]);
    
    	$this->load($params);
    
    	if (!($this->load($params) && $this->validate())) {
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
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
    
    public function searchListeReformeNonSortiePatrimoine($params)
    {
    
    	$query = Bien::find()->where(['statutbien'=>['reformertransfinvamort','reformer']]);//,'reformertransf'
    	$dataProvider = new ActiveDataProvider([
    
    			'query' => $query,
    			'pagination' => [
    			'pageSize' => 20,
    			],
    			]);
    
    	$this->load($params);
    
    	if (!($this->load($params) && $this->validate())) {
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
    			'garantie' => $this->garantie,
    			]);
    
    	$query->andFilterWhere(['like', 'typebien', $this->typebien])
    	->andFilterWhere(['like', 'designationbien', $this->designationbien])
    	->andFilterWhere(['like', 'dateacquisition', $this->dateacquisition])
    	->andFilterWhere(['like', 'statutbien', $this->statutbien])
    	->andFilterWhere(['like', 'etatbien', $this->etatbien])
    	->andFilterWhere(['like', 'typeamort', $this->typeamort])
    	->andFilterWhere(['like', 'commentaire', $this->commentaire])
    	->andFilterWhere(['like', 'datedebugarantie', $this->datedebugarantie])
    	->andFilterWhere(['like', 'dateenr', $this->dateenr]);
    	//->andFilterWhere(['LIKE', 'designationbureau', $this->bureau.designationbureau]);
    
    	return $dataProvider;
    }
}
