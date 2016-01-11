<?php

namespace frontend\controllers;

use Yii;
use app\models\Reformer;
use app\models\ReformerSearch;
use app\models\Bien;
use app\models\BienSearch;
use app\models\Intervenant;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\SousFamilleSearch;
use app\models\FamilleSearch;
use app\models\IntervenantSearch;
use yii\data\ActiveDataProvider;


/**
 * ReformerController implements the CRUD actions for Reformer model.
 */
class ReformerController extends Controller
{
	
		
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reformer models.
     * @return mixed
     */
    
    public function actionIndex()
    {
        $searchModel = new ReformerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reformer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reformer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reformer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->codebien]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reformer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->codebien]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reformer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reformer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reformer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reformer::findOne($id)) !== null) {
            return $model;
        } 
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /************************
     * la reforme
    * *************************/

    
    public function CalculeAmortissementsref ($datacq, $datereforme, $anneeexerc, $dureevie, $prixachat)
    {
    
    	/*****************           premiere annuité      *************/
    	$res=null;
    	$dateac=explode('/',$datacq);
    	$dateac[2]="20".$dateac[2];
    	$taux=0;
    	if($dureevie!=0)
    	{
    		$taux = 1/$dureevie;
    	}
    	$jour=$dateac[0];
    
    	$mois=$dateac[1];
    	$nbrjours=0;
    	$amortcumul=0;
    	if($jour== '01')
    	{
    		if($mois=='01')
    		{
    			$nbrjours=360;
    		}
    		else {
    			$nbrmois=12-$mois;
    			$nbrjours=$nbrmois*30;
    		}
    	}
    	else
    	{
    		$nbrmois=12-$mois;
    		$nbrjours=$nbrmois*30;
    		$nbrjours=$nbrjours + (30-$jour);
    
    	}
    
    	$dotationpremiere = $prixachat * $taux * $nbrjours/360 ;
    	$amortcumul=$dotationpremiere;
    	$res[0][0]=$dateac[2];
    	$res[0][1]=$prixachat;//number_format($prixachat, 2, ',', ' ');
    	$res[0][2]=$dotationpremiere;//number_format($dotationpremiere, 2, ',', ' ');
    	$res[0][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
    	$res[0][4]=$prixachat-$amortcumul;
    
    	/***************************         autres annuites   **********************   *************/
    	$anneesuiv= $dateac[2]+1;
    	$i=1;
    	do {
    		$dotations =  $prixachat * $taux;
    		$amortcumul=$amortcumul+ $dotations;
    		$res[$i][0]=$anneesuiv;
    		$res[$i][1]=$prixachat;//number_format($prixachat, 2, ',', ' ');
    		$res[$i][2]=$dotations;//number_format($dotations, 2, ',', ' ');
    		$res[$i][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
    		$res[$i][4]=($prixachat-$amortcumul);//number_format(($prixachat-$amortcumul), 2, ',', ' ');
    		$anneesuiv = $anneesuiv + 1;
    		$i++;
    	}
    	while($anneesuiv <= $anneeexerc-1);
    
    	/************** annuité derniere année *********************************/
    
    	$dateref=explode('/',$datereforme);
    	$dateref[2]="20".$dateref[2];
    	$jourref=$dateref[0];
    	$moisref=$dateref[1];
    	$nbrjoursref=0;
    
    	if($jourref== '01')
    	{
    		if($moisref=='01')
    		{
    			$nbrjoursrf=360;
    		}
    		else
    		{
    			$nbrmoisref=12-$moisref;
    			$nbrjoursref=$nbrmoisref*30;
    		}
    	}
    	else
    	{
    		$nbrmoisref=12-$moisref;
    		$nbrjoursref=$nbrmoisref*30;
    		$nbrjoursref=$nbrjoursref + (30-$jourref);
    		 
    	}
    	$deniereanuitee= ((360 - $nbrjoursref)/360)*$taux*$prixachat;
    
    	$amortcumul=$amortcumul+ $deniereanuitee;
    	$res[$i][0]=$anneesuiv;
    	$res[$i][1]= $prixachat;//number_format($prixachat, 2, ',', ' ');
    	$res[$i][2]=$dotations;//number_format($dotations, 2, ',', ' ');
    	$res[$i][3]=$amortcumul;//number_format($amortcumul, 2, ',', ' ');
    	$res[$i][4]=($prixachat-$amortcumul);//number_format(($prixachat-$amortcumul), 2, ',', ' ');
    
    	return $res;
    }
    
    
    /*
     * liste des biens reformés
    */
    
  
    public function actionListereformeesortirpatrimoine()
    {
    	$i=0;
    	$model= new Reformer();
    	$searchModel = new ReformerSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$data=array();
    	$models=$dataProvider->getModels();

    	if ($model->load(Yii::$app->request->post()))
    	 {
    	 	
    		foreach ($models as $row)
    	{
    		
    		$searchModelB = new BienSearch();
    		$ress = explode('/',$row->datereforme);
    		$annee=$ress[2];
    		if(strlen($model->anneeRef)==4){
    		$manneeRef = substr($model->anneeRef, -2);
    		
    		if($manneeRef==$annee)
    		{
    			
    		$dataProviderB = $searchModelB->searchListeReformee(Yii::$app->request->queryParams, $row->codebien);
    
    		$modelsB=$dataProviderB->getModels();
    		foreach ($modelsB as $rowB)
    		{ 	
    			if($rowB->statutbien=="sortirf")
    			$data[$i] = ['codebien' => $row->codebien, 'designationbien'=>$rowB->designationbien, 'typereforme'=>$row->typereforme,'datereforme'=>$row->datereforme];
    			$i++;
    		}
    		}
    	}
    	else
    	 {
    	 	\Yii::$app->getSession()->setFlash('info', 'SVP resaisir l annee de r������forme.');
    	 	 
    	}
    	}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => [ 'codebien', 'designationbien', 'dateacquisition','typereforme','datereforme'],
    			],
    			]);
    
    	//  $modeltest=$dataProviderRes->getModels();
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('listeBienReformerSortie',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    
    }
    
    
    

    /*
     * liste des biens reformés cédé
    */
    
    
    public function actionListereformeecedesortirpatrimoine()
    {
    	$i=0;
    	$model= new Reformer();
    	$searchModel = new ReformerSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$data=array();
    	$models=$dataProvider->getModels();
    
    	if ($model->load(Yii::$app->request->post()))
    	{
    		 
    		foreach ($models as $row)
    		{
    
    			$searchModelB = new BienSearch();
    			$ress = explode('/',$row->datereforme);
    			$annee=$ress[2];
    			if(strlen($model->anneeRef)==4){
    				$manneeRef = substr($model->anneeRef, -2);
    
    				if($manneeRef==$annee)
    				{
    					 if($row->typereforme=="Cession")
    					 {
    					$dataProviderB = $searchModelB->searchListeReformee(Yii::$app->request->queryParams, $row->codebien);
    
    					$modelsB=$dataProviderB->getModels();
    					foreach ($modelsB as $rowB)
    					{
    						if($rowB->statutbien=="sortirf")
    						{
    						    $plusv=0;
    						    $moinsv=0;
    							$modelre=$this->calculeAmort($rowB, $row->datereforme);
    							// CalculeAmortissementsref ($datacq, $datereforme, $anneeexerc, $dureevie, $prixachat)
    						   $modelreee= $this->CalculeAmortissementsref ($rowB->dateacquisition, $row->datereforme, $manneeRef, $rowB->dureevie, $rowB->prixachat);
    						    $modelre->valeurnet=$modelreee[count($modelreee)-1][4];
    						    
    						    
    						    $diffprix=$row->prixvente - $modelre->valeurnet;		
    					        if($diffprix>0) $plusv=$diffprix;
    					        if($diffprix<0) $moinsv=$diffprix * -1;
    					        if($diffprix=0)
    					        {  
    					        	$moinsv=0;
    					        	$plusv=0;
    					        }
    					        	
    					        $modelre->amortpratiquee=$modelreee[count($modelreee)-1][3];
    					        $amort = number_format($modelre->amortpratiquee, 2, ',', ' ');
    					        $vn = number_format($modelre->valeurnet, 2, ',', ' ');
    					        $plusv = number_format($plusv, 2, ',', ' ');
    					        $moinsv = number_format($moinsv, 2, ',', ' ');
    					        
    							$data[$i] = ['codebien' => $row->codebien, 'designation bien'=>$rowB->designationbien,
    							'date acquisition'=>$rowB->dateacquisition,'actif brut'=>$rowB->prixachat,'amortissement pratiquee'=>$amort,'valeur nette'=>$vn,
    							'prix cession'=>$row->prixvente,'plus value'=>$plusv,'moins value'=>$moinsv];
    					     	$i++;
    					   }
    					}
    				  }
    				}
    			}
    			else
    			{
    				\Yii::$app->getSession()->setFlash('info', 'SVP resaisir l annee de réforme.');
    
    			}
    		}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => [ 'codebien', 'designation bien', 'date acquisition','actif brut','amortissement pratiquee','valeur nette',
    							'prix cession','plus value','moins value'],
    			],
    			]);
    
    	//  $modeltest=$dataProviderRes->getModels();
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('listeBienReformerCedeSortie',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    
    }
    
    
    /**
     * Don
     */

    public function actionListereformeedonsortirpatrimoine()
    {
    	$i=0;
    	$model= new Reformer();
    	$searchModel = new ReformerSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$data=array();
    	$models=$dataProvider->getModels();
    
    	if ($model->load(Yii::$app->request->post()))
    	{
    		 
    		foreach ($models as $row)
    		{
    
    			$searchModelB = new BienSearch();
    			$ress = explode('/',$row->datereforme);
    			$annee=$ress[2];
    			if(strlen($model->anneeRef)==4){
    				$manneeRef = substr($model->anneeRef, -2);
    
    				if($manneeRef==$annee)
    				{
    					 
    					$dataProviderB = $searchModelB->searchListeReformee(Yii::$app->request->queryParams, $row->codebien);
    
    					$modelsB=$dataProviderB->getModels();
    					foreach ($modelsB as $rowB)
    					{  
    						if($row->typereforme=="Don")
    						{
    							if($rowB->statutbien=="sortirf")
    							{  
    						$data[$i] = ['codebien' => $row->codebien, 'designation bien'=>$rowB->designationbien, 
    						'date reforme'=>$row->datereforme, 'unité'=>$row->titre];
    						$i++;
    					   }
    						}
    					}
    				}
    			}
    			else
    			{
    				\Yii::$app->getSession()->setFlash('info', "SVP resaisir l'annee de réforme.");
    
    			}
    		}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => [ 'codebien', 'designation bien', 'date acquisition','type reforme','date reforme','unité'],
    			],
    			]);
    
    	//  $modeltest=$dataProviderRes->getModels();
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('listeBienReformerDonSortie',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    
    }
    
    
    
    /*********************************************************************************************************/


    public function actionListereformeeautresortirpatrimoine()
    {
    	$i=0;
    	$model= new Reformer();
    	$searchModel = new ReformerSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$data=array();
    	$models=$dataProvider->getModels();
    
    	if ($model->load(Yii::$app->request->post()))
    	{
    		 
    		foreach ($models as $row)
    		{
    
    			$searchModelB = new BienSearch();
    			$ress = explode('/',$row->datereforme);
    			$annee=$ress[2];
    			if(strlen($model->anneeRef)==4){
    				$manneeRef = substr($model->anneeRef, -2);
    
    				if($manneeRef==$annee)
    				{
    
    					$dataProviderB = $searchModelB->searchListeReformee(Yii::$app->request->queryParams, $row->codebien);
    
    					$modelsB=$dataProviderB->getModels();
    					foreach ($modelsB as $rowB)
    					{
    						if(($row->typereforme!="Don")&&($row->typereforme!="Don"))
    						{
    						if($rowB->statutbien=="sortirf")
    						{
    							$data[$i] = ['codebien' => $row->codebien, 'designation bien'=>$rowB->designationbien, 'type reforme'=>$row->typereforme,
    							'date reforme'=>$row->datereforme];
    							$i++;
    						}
    						}
    					}
    				}
    			}
    			else
    			{
    				\Yii::$app->getSession()->setFlash('info', 'SVP resaisir l annee de réforme.');
    
    			}
    		}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => [ 'codebien', 'designation bien', 'date acquisition','type reforme','date reforme','unité'],
    			],
    			]);
    
    	//  $modeltest=$dataProviderRes->getModels();
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('listeBienReformerAutreSortie',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    
    }
    
    
    
    /*********************************************************************************************************/
    
    
    /* C bon
     * liste des biens reformés
    */
    
    
    public function actionListereformeenonsortirpatrimoine()
    {
    	$i=0;
    	$model= new Reformer();
    	$searchModel = new ReformerSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$data=array();
    	$models=$dataProvider->getModels();
    	if ($model->load(Yii::$app->request->post()))
    	 {
    	 	$type=null;
    	 	$type=$model->typereforme; 
    	 	if($type==0)
    	 	$type="Cession";
    	 	if($type==1)
    	 		$type="Don";
    	 	if($type==2)
    	 		$type="Mise au rebut";
    	 	if($type==3)
    	 		$type="Perdu";
    		foreach ($models as $row)
    	{
    		
    		$searchModelB = new BienSearch();
    		$ress = explode('/',$row->datereforme);
    		$annee=$ress[2];
    		if(strlen($model->anneeRef)==4)
    		{
    		if(($model->anneeRef)<= date('Y'))
    		{
    			$manneeRef = substr($model->anneeRef, -2);
    		
    		if($manneeRef==$annee)
    		{ 
    			
    		if($type==$row->typereforme)
    		{	
    		$dataProviderB = $searchModelB->searchListeReformee(Yii::$app->request->queryParams, $row->codebien);
    
    		$modelsB=$dataProviderB->getModels();
    		foreach ($modelsB as $rowB)
    		{ 	
    			if($rowB->statutbien!="sortirf")
    			$data[$i] = ['codebien' => $row->codebien, 'designation bien'=>$rowB->designationbien, 'type reforme'=>$row->typereforme,'date reforme'=>$row->datereforme];
    			$i++;
    		}
    		}
    		}
    		}
    		else
    		{
    			\Yii::$app->getSession()->setFlash('info', "SVP insérer une année  inférieur à l'année actuelle.");
    		}
    	}
    	else
    	{
    	 	\Yii::$app->getSession()->setFlash('info', "SVP resaisir l'année de réforme.");
    	 	 
    	}
    	}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => [ 'codebien', 'designation bien', 'dateacquisition','type reforme','date reforme'],
    			],
    			]);
    
    	//  $modeltest=$dataProviderRes->getModels();
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('listeBienReformerNonSortie',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    
    }
    
    public function actionSortirbiencede()
    {
    	$model= new Reformer();
    	$ref=new Reformer();
    	$data=null;
    	
    	if ($model->load(Yii::$app->request->post()))
    	{
    		$selection=(array)Yii::$app->request->post('selection');
    		foreach($selection as $id)
    		{
    			$x=0;
    			$modelss= $this->findModel($id);
    			$modelReformerSearch= new ReformerSearch();
    			$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$modelss->codebien);
    			$modelb=$dataProviderRS->getModels();
    
    			foreach ($modelb as $rowb)
    			{
    				if($rowb->booleann!='2')
    				{ 
    					$modelss->prixvente=$model->prixvente;
    					$modelss->booleann="1";
    					$modelss->save();
    				}
    			}
    		}
    	}
    
    	$searchModel = new BienSearch();
    	$i=0;
    	$dataProvider = $searchModel->searchListeReformeNonSortiePatrimoine(Yii::$app->request->queryParams);
    
    	$models=$dataProvider->getModels();
    	foreach ($models as $row)
    	{
    		/*---------------------------------  recherche type de reforme et la date de reforme ------------------------*/
    		$comptecomp= $this->cherchercomptebien($row->codebien);
    		$modelReformerSearch= new ReformerSearch();
    		$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$row->codebien);
    		$modelb=$dataProviderRS->getModels();
    		$typ=null;
    		$ann=null;
    
    		foreach ($modelb as $rowb)
    		{
    			$typ = $rowb->typereforme;
    			$ann = $rowb->datereforme;
    
    		}
    
    		/*-----------------------------------------------tableau de resultat------------------------------------------------*/
    		if($typ=="Cession")
    		{
    			$data[$i] = ['comptecomptable' => $comptecomp, 'codebien' => $row->codebien, 'designationbien'=>$row->designationbien, 'typereforme'=>$typ,'prixvente'=>$model->prixvente, 'dateRef'=>$ann];
    			$i++;
    		}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'key'=>'codebien',
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => ['comptecomptable', 'codebien', 'designationbien', 'typereforme','prixvente', 'dateRef'],
    			],
    			]);
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('sortirbienpatrimoine',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    }
    
    
    /*    ajouter le commissaire priseur dans la table des biens cede */
    
    public function actionIntervcession()
    {
    	$modelbien= new Bien();
    	$model=new Reformer();
    	$modelss=new Intervenant();
    	$n=0;
    	$data=null;
    	$selectionn=(array)Yii::$app->request->post('selection');
    	 
    	$selection=(array)Yii::$app->request->post('selection');
    	foreach($selectionn as $idn)
    	{
    		$n++;
    	}
    	if($n<2){
    	foreach($selection as $id)
    	{ 
    		$modelref=new Reformer();
    		$x=0;
    		$modelIntervSearch= new IntervenantSearch();
    		$dataProviderinter = $modelIntervSearch->searchinter(Yii::$app->request->queryParams,$id);
    		//$dataProviderinter = $modelIntervSearch->searchinter(Yii::$app->request->queryParams);
    		
    		$modelinter=$dataProviderinter->getModels();
    		foreach($modelinter as $rowinter)
    		{
    		
    		$modelReformerSearch= new ReformerSearch();
    		$dataProviderRS = $modelReformerSearch->searchRefbool(Yii::$app->request->queryParams,'1');
    		$modelb=$dataProviderRS->getModels();
    		foreach($modelb as $rowb)
    		{
    			 
    			if($rowb->booleann=='1')
    			{
    				$modelref= $this->findModel($rowb->codebien);
    				
    				$modelref->titre=$rowinter->titre;
    				$modelref->booleann="2";
    				$modelref->save();
    				
    					
    				$query = Bien::find()->where(['codebien'=>$rowb->codebien]);
    				$dataProviderBien = new ActiveDataProvider([
    						'query' => $query,
    						'pagination' => [
    						'pageSize' => 10,
    						],
    						]);
    				
    				$modelsortir=$dataProviderBien->getModels();    				
    				foreach($modelsortir as $rowbs)
    				{ 
    					$modelbien->codebien=$rowbs->codebien;
    					$rowbs->statutbien="sortirf";
    					$rowbs->save();
    				}
    			}
    		}
    		}
    	}
    	}
    	else 
    	{
    		\Yii::$app->getSession()->setFlash('info', 'SVP choisir un seul intervenant.');
    		
    	}
    	$searchModel = new BienSearch();
    	$i=0;
    	$dataProvider = $searchModel->searchListeReformeNonSortiePatrimoine(Yii::$app->request->queryParams);
    
    	$models=$dataProvider->getModels();
    	foreach ($models as $row)
    	{
    		/*---------------------------------  recherche type de reforme et la date de reforme ------------------------*/
    		$comptecomp= $this->cherchercomptebien($row->codebien);
    		$modelReformerSearch= new ReformerSearch();
    		$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$row->codebien);
    		$modelb=$dataProviderRS->getModels();
    		$typ=null;
    		$ann=null;
    
    		foreach ($modelb as $rowb)
    		{
    			$typ = $rowb->typereforme;
    			$ann = $rowb->datereforme;
    			$modelboole=$this->findModel($rowb->codebien);
    			if($modelboole->booleann=='1')
    			{
    				$modelboole->booleann='0';
    				$modelboole->save();
    			}
    
    		}
    
    		/*-----------------------------------------------tableau de resultat------------------------------------------------*/
    		if($typ=="Cession")
    		{
    			$data[$i] = ['comptecomptable' => $comptecomp, 'codebien' => $row->codebien, 'designationbien'=>$row->designationbien, 'typereforme'=>$typ, 'dateRef'=>$ann];
    			$i++;
    		}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'key'=>'codebien',
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => ['comptecomptable', 'codebien', 'designationbien', 'typereforme', 'dateRef'],
    			
    			],
    			]);
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('sortirbienpatrimoine',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    
    	$searchModel = new IntervenantSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
    	return $this->render('test', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			]);
    }    
       
     
    /*******************************************************************/
    
    public function cherchercomptebien($code)
    {
    	$res=00;
    	$model= new BienSearch();
    	$searchModel= new BienSearch();
    	//searchConsultationBienSelonCode
    	$dataProvider = $searchModel->searchConsultationBienSelonCode(Yii::$app->request->queryParams,$code);
    	$modelss=$dataProvider->getModels();
    
    	foreach ($modelss as $rowsF)
    	{
    		 
    		$searchModelsf = new SousFamilleSearch();
    		$dataProvidersf = $searchModelsf->searchSF(Yii::$app->request->queryParams,$rowsF->codesousfamille);
    		$modelss=$dataProvidersf->getModels();
    
    		foreach ($modelss as $rowsF)
    		{
    			$searchModelsf = new SousFamilleSearch();
    			$dataProvidersf = $searchModelsf->searchSF(Yii::$app->request->queryParams,$rowsF->codesousfamille);
    			$modelss=$dataProvidersf->getModels();
    
    			foreach ($modelss as $rowsF)
    			{
    				$searchModelF = new FamilleSearch();
    				$dataProviderF = $searchModelF->searchFC(Yii::$app->request->queryParams, $rowsF->codefamille);
    				$modelF=$dataProviderF->getModels();
    				foreach ($modelF as $rowF)
    				{
    
    					$res=$rowF->codecomptecomptable;
    					return $res;
    
    				}
    			}
    		}
    	}
    }
    
    
    public function actionSortirbiendon()
    {
    	$modelbien= new Bien();
    	$model= new Reformer();
    	$ref=new Reformer();
    	$data=null;
    	
    	if ($model->load(Yii::$app->request->post()))
    	{
    		$selection=(array)Yii::$app->request->post('selection');
    		foreach($selection as $id)
    		{
    			$x=0;
    			$modelss= $this->findModel($id);
    			$modelReformerSearch= new ReformerSearch();
    			$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$modelss->codebien);
    			$modelb=$dataProviderRS->getModels();
    
    			foreach ($modelb as $rowb)
    			{
    				     
    					//$modelss->prixvente=$model->prixvente;
    					//$modelss->booleann="1";
    					if($model->titre!=null){
    				$modelss->titre=$model->titre;
    					$modelss->save();
    					
    					

    					$query = Bien::find()->where(['codebien'=>$rowb->codebien]);
    					$dataProviderBien = new ActiveDataProvider([
    							'query' => $query,
    							'pagination' => [
    							'pageSize' => 10,
    							],
    							]);
    					
    					$modelsortir=$dataProviderBien->getModels();
    					foreach($modelsortir as $rowbs)
    					{
    						$modelbien->codebien=$rowbs->codebien;
    						$rowbs->statutbien="sortirf";
    						$rowbs->save();
    					}
    					
    					
    					}
    					else
    					{
    						
    							\Yii::$app->getSession()->setFlash('info', 'SVP choisissez une unite.');
    					}
    			}
    		}
    		
    	}
    	
      
    	$searchModel = new BienSearch();
    	$i=0;
    	$dataProvider = $searchModel->searchListeReformeNonSortiePatrimoine(Yii::$app->request->queryParams);
    
    	$models=$dataProvider->getModels();
    	foreach ($models as $row)
    	{
    		/*---------------------------------  recherche type de reforme et la date de reforme ------------------------*/
    		$comptecomp= $this->cherchercomptebien($row->codebien);
    		$modelReformerSearch= new ReformerSearch();
    		$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$row->codebien);
    		$modelb=$dataProviderRS->getModels();
    		$typ=null;
    		$ann=null;
    
    		foreach ($modelb as $rowb)
    		{
    			$typ = $rowb->typereforme;
    			$ann = $rowb->datereforme;
    
    		}
    
    		/*-----------------------------------------------tableau de resultat------------------------------------------------*/
    		if($typ=="Don")
    		{
    			$data[$i] = ['comptecomptable' => $comptecomp, 'codebien' => $row->codebien, 'designationbien'=>$row->designationbien, 'typereforme'=>$typ, 'dateRef'=>$ann];
    			$i++;
    		}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'key'=>'codebien',
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => ['comptecomptable', 'codebien', 'designationbien', 'typereforme', 'dateRef'],
    			],
    			]);
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('sortirbienpatrimoineDon',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    }
    
    public function actionSortirbienautre()
    {
    	$modelbien= new Bien();
    	$model= new Reformer();
    	$ref=new Reformer();
    	$data=null;
    
    		$selection=(array)Yii::$app->request->post('selection');
    		foreach($selection as $id)
    		{  
    			
    			$x=0;
    			$modelss= $this->findModel($id);
    			$modelReformerSearch= new ReformerSearch();
    			$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$modelss->codebien);
    			$modelb=$dataProviderRS->getModels();
    
    			foreach ($modelb as $rowb)
    			{
    			    	$modelss->titre=$model->titre;
    					$modelss->save();
    					$query = Bien::find()->where(['codebien'=>$rowb->codebien]);
    					$dataProviderBien = new ActiveDataProvider([
    							'query' => $query,
    							'pagination' => [
    							'pageSize' => 10,
    							],
    							]);
    						
    					$modelsortir=$dataProviderBien->getModels();
    					foreach($modelsortir as $rowbs)
    					{
    						$modelbien->codebien=$rowbs->codebien;
    						$rowbs->statutbien="sortirf";
    						$rowbs->save();
    					}
    			}
    		}
    
    	
    	 
    
    	$searchModel = new BienSearch();
    	$i=0;
    	$dataProvider = $searchModel->searchListeReformeNonSortiePatrimoine(Yii::$app->request->queryParams);
    
    	$models=$dataProvider->getModels();
    	foreach ($models as $row)
    	{
    		/*---------------------------------  recherche type de reforme et la date de reforme ------------------------*/
    		$comptecomp= $this->cherchercomptebien($row->codebien);
    		$modelReformerSearch= new ReformerSearch();
    		$dataProviderRS = $modelReformerSearch->searchRef(Yii::$app->request->queryParams,$row->codebien);
    		$modelb=$dataProviderRS->getModels();
    		$typ=null;
    		$ann=null;
    
    		foreach ($modelb as $rowb)
    		{
    			$typ = $rowb->typereforme;
    			$ann = $rowb->datereforme;
    echo "type=".$typ;
    		}
    
    		/*-----------------------------------------------tableau de resultat------------------------------------------------*/
    		if(($typ!="Don")&&($typ!="Cession"))
    		{
    			$data[$i] = ['comptecomptable' => $comptecomp, 'codebien' => $row->codebien, 'designationbien'=>$row->designationbien, 'typereforme'=>$typ, 'dateRef'=>$ann];
    			$i++;
    		}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'key'=>'codebien',
    			'allModels' => $data,
    			'sort' => [
    			'attributes' => ['comptecomptable', 'codebien', 'designationbien', 'typereforme', 'dateRef'],
    			],
    			]);
    
    	$dataProvider=$dataProviderRes;
    
    	return $this->render('sortirbienpatrimoineAutre',
    			[
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model' => $model,
    			]
    	);
    }

    /**
     * Calcule des amortissements
     */
    
    public function calculeAmort($row, $datep)
    {    
    
    	$formatter = \Yii::$app->formatter;
    	$row->dotation = $row->prixachat * ($row->tauxamort/100);
    	$datsep=explode('/',$row->dateacquisition);
    	 
    	/*    la date d'acquisition*/
    	 
    	$datacq=$datsep[1].'/'.$datsep[0].'/'.$datsep[2];
    	//second acquisition
    	 
    	$secAcq= mktime(0, 0, 0, $datsep[1], $datsep[0], $datsep[2]);
    	$datacq=strftime("%m/%d/%y",strtotime($datacq)) ;
    	$dateStr=$datacq;
    	$date2=new \DateTime($dateStr);
    	$dureevie=$row->dureevie;
    	date_add($date2,date_interval_create_from_date_string($dureevie." days"));
    	$dateStr2=date_format($date2,"m-d-y");
    	 
    	$datsep2=explode('-',$dateStr2);
    	$dataamo=$datsep2[1].'/'.$datsep2[0].'/'.$datsep2[2];
    	$secdtamo= mktime(0, 0, 0, $datsep2[0], $datsep2[1], $datsep2[2]);
    	 
    	$now=null;
    	$now=$datep;
    	$datsepnow=explode('/',$datep);
    	$secdref= mktime(0, 0, 0, $datsepnow[1], $datsepnow[0], $datsepnow[2]);
    	 
    
    	 
    	if($dureevie!=0)
    	{
    		 
    		$amortPJ=($row->prixachat)/$dureevie;
    		 
    	}
    	if($secdtamo <= $secdref)
    	{
    		$diff  = abs($secdtamo - $secAcq);
    		$nbrJ=floor($diff/(60*60*24));
    		$row->amortpratiquee= ($amortPJ * $nbrJ);
    		 
    	}
    	 
    	else
    	{
    		 
    		$diff  = abs($secdref - $secAcq);
    		$nbrJ=floor($diff/(60*60*24));
    		$row->amortpratiquee= ($amortPJ * $nbrJ);
    		 
    	}
    
    	$row->actifbrut=$row->prixachat;
    	$row->valeurnet= ($row->actifbrut - $row->amortpratiquee);
    	/*	$rowsbb->valeurnet = number_format($rowsbb->valeurnet, 2, ',', ' ');
    	 $rowsbb->dotation = number_format($rowsbb->dotation, 2, ',', ' ');
    	$rowsbb->amortpratiquee = number_format($rowsbb->amortpratiquee, 2, ',', ' ');
    	$rowsbb->actifbrut = number_format($rowsbb->actifbrut, 2, ',', ' ');
    	*/
    	 
    	 
    	 
    	return $row;
    }

    public function actionTestamort()
    {
    	$model= new Bien();
        $model = $model::findOne(19);
    	$this->calculeAmort($model, '28/08/2015');
    	
    	 
    }
    
    

}
