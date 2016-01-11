<?php

namespace frontend\controllers;

use Yii;
use app\models\AffecterSearch;
use app\models\Affecter;
use app\models\Exerciceinventaire;
use app\models\ExerciceinventaireSearch;

use app\models\Transferer;
use app\models\Inventorier;
use app\models\Bien;
use app\models\Bureau;
use app\models\Structure;
use app\models\BureauSearch;
use app\models\BienSearch;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider ;

use app\models\InventorierSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InventorierController implements the CRUD actions for Inventorier model.
 */
class InventorierController extends Controller
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
     * Lists all Inventorier models.
     * @return mixed
     */
    
    public function actionIndex()
    {
        $searchModel = new InventorierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inventorier model.
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
     * Creates a new Inventorier model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inventorier();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->codebien]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inventorier model.
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
     * Deletes an existing Inventorier model.
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
     * Finds the Inventorier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inventorier the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inventorier::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
  
    /*************************** Methode dernier transfer****************************************************************/
    
    protected function dernierTransfert($code){
    
    	$burDe = '';
    	$burVer = '';
    	 
    	$models = Transferer::find()
    	->where(['codebien' => $code])
    	//->orderBy(['dt'=> SORT_DESC])
    	->orderBy(['dt'=> SORT_ASC])
    	->all();
    	if ($models) {

    		$cont = Transferer::find()
    		->where(['codebien' => $code])
    		->orderBy('dt')
    		->count();
    		$i=0;
    		 
    		foreach ($models as $model){
    
    			$bureau[$i] = $model->codebureau;
    			$i++;
    		}
    		if($cont==1)
    		{
    			$burVer=$bureau[0];
    		} 
    		if($cont!=1){
    		for ($i=0;$i<$cont-1;$i++)
    		{
    
    			$burDe=$bureau[$i];
    			$burVer=$bureau[$i+1];
    		}
    			 
    		}
    
    	}
 
    	return  $burVer;
    
    }
    
   			
    /***************************  Enregistrer comptage 01***************************************************************/
    public function actionEnregistrercomp()
    {
    	$model= new Inventorier();
    	$data=null;
    	$searchModel = new InventorierSearch();
    	$i=0;
    	$dataProvider = $searchModel->searchInv(Yii::$app->request->queryParams,'0','0');
    	 
    	

    			$selection=(array)Yii::$app->request->post('selection');//typecasting
    		
    		foreach($selection as $id)
    		{
    		$query = Bien::find()->where(['codebien'=>$id]);
    		$dataProvider1 = new ActiveDataProvider([
    				'query' => $query,
    				]);
    		 
    		$models1=$dataProvider1->getModels();
    		foreach ($models1 as $row1)
    		{
    		if($row1->statutbien=="transfere")
    		{
    		$bur=$this->dernierTransfert($row1->codebien);
    		}
    		if($row1->statutbien=="affecte")
    		{  
    		$query = Affecter::find()->where(['codebien'=>$id]);
    		$dataProvidera = new ActiveDataProvider([
    				'query' => $query,
    				]);
    		
    		$modelsa=$dataProvidera->getModels();
    		foreach ($modelsa as $rowa)
    		{
    		$bur=$rowa->codebureau;
    		}
    		
    		}
    		 
    		}
    		 
    		/************************************enregistrement au niveau de la table inventorier **********************************/
    			
    			  
    		if((($inv = Inventorier::findOne($id)) !== null))
    		{
    	
    		$inv->comptage1=1;
    		
    		$inv->save();
    		}
    		else 
    		{
    			$inv= new Inventorier();
    			$inv->codebien=$id;
    			$inv->anneeinv=date('Y');
    			$inv->comptage1=1;
    			$inv->bureau=$bur;
    			$inv->save();
    		}
    		}
    		if ($model->load(Yii::$app->request->post()))
    		{
    		
    		 $querystr = Structure::find();
    		
    		$dataProviderstr = new ActiveDataProvider([
    				'query' => $querystr,
    				]);
    		
    		$modelsstr=$dataProviderstr->getModels();
    		foreach ($modelsstr as $rowstr)
    		{
    		if(intval($model->codestructure)==$rowstr->codestructure)
    		{
    		$model->designationstructure=$rowstr->designation;
    		}
    		}
    		
    		$searchModelbur = new BureauSearch();
    		$dataProviderbur = $searchModelbur->search(Yii::$app->request->queryParams);
    		$modelsbur=$dataProviderbur->getModels();
    		foreach ($modelsbur as $rowbur)
    		{
    		
    			if($rowbur->codestructure == intval($model->codestructure))
    			{
    			
    				$searchModelaff = new AffecterSearch();
    				$dataProvideraff = $searchModelaff->searchCodbur(Yii::$app->request->queryParams,$rowbur->codebureau);
    				$modelsaff = $dataProvideraff->getModels();
    		
    				foreach ($modelsaff as $rowaff)
    				{
    					//searchConsultationBienSelonCode
    					
    					$searchModelbien = new BienSearch();
    					$dataProviderbien = $searchModelbien->searchConsultationBienSelonCodestatut(Yii::$app->request->queryParams, $rowaff->codebien);
    					$modelbien=$dataProviderbien->getModels();
    					 
    					foreach ($modelbien as $rowbien)
    					{
    						
    						if($rowbien->statutbien=="affecte")
    						{
    							
    						if ((($modeltrouv = Inventorier::findOne($rowbien->codebien)) == null)||($modeltrouv->comptage1==null))
    								{ 
    								$data[$i] = ['codebien'=>$rowbien->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$rowbur->codebureau,'etat'=>$rowbien->etatbien,];
    								$i++;
    							}
    						}
    						else
    						{
    							if($rowbien->statutbien=="transfere")
    							{
    		
    								$bur=$this->dernierTransfert($rowbien->codebien);
    								if ((($modeltrouv = Inventorier::findOne($rowbien->codebien)) == null)||($modeltrouv->comptage1==null))
    								{  
    									$data[$i] = ['codebien'=>$rowbien->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$bur,'etat'=>$rowbien->etatbien,];
    									$i++;
    								}
    							}
    						}
    					}
    				}
    			}
    		}
    		
    		$dataProviderRes = new ArrayDataProvider([
    				'allModels' => $data,
    				'key' =>'codebien',
    				'sort' => [
    				'attributes' => ['codebien','designation','bureau','etat',],
    					
    				],
    				]);
    		 
    		//  $modeltest=$dataProviderRes->getModels();
    		
    		$dataProvider=$dataProviderRes;
    		return $this->render('marquage01', [
    		
    				'searchModel' => $searchModel,
    				'dataProvider' => $dataProvider,
    				'model'=>$model,
    				]);
    		}
    	 
    
    
    	//  $modeltest=$dataProviderRes->getModels();
    	 
    	//$dataProvider=$dataProviderRes;
    
    	return $this->render('marquage01', [
    
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    }
    
    
    /************************************************  Enregistrer comptage 02***************************************************************/
    public function actionEnregistrercomp2()
    {
    	$model= new Inventorier();
    	$data=null;
    	$searchModel = new InventorierSearch();
    	$i=0;
    	$dataProvider = $searchModel->searchInv(Yii::$app->request->queryParams,'0','0');
    	 
    	if ($model->load(Yii::$app->request->post()))
    	{
   			$selection=(array)Yii::$app->request->post('selection');
    		
    		foreach($selection as $id)
    		{
    		$query = Bien::find()->where(['codebien'=>$id]);
    		$dataProvider1 = new ActiveDataProvider([
    				'query' => $query,
    				]);
    		 
    		$models1=$dataProvider1->getModels();
    		foreach ($models1 as $row1)
    		{
    		if($row1->statutbien=="transfere")
    		{
    		$bur=$this->dernierTransfert($row1->codebien);
    		}
    		if($row1->statutbien=="affecte")
    		{
    		$query = Affecter::find()->where(['codebien'=>$id]);
    		$dataProvidera = new ActiveDataProvider([
    				'query' => $query,
    				]);
    		
    		$modelsa=$dataProvidera->getModels();
    		foreach ($modelsa as $rowa)
    		{
    		$bur=$rowa->codebureau;
    		}
    		
    		}
    		 
    		}
    		 
    		/************************************enregistrement au niveau de la table inventorier **********************************/
    			
    			  
    	
    		if((($inv = Inventorier::findOne($id)) !== null))
    		{
    			
    	/*	$inv->codebien=$id;
    		$inv->anneeinv=$model->anneeinv;*/
    		$inv->comptage2=1;
    		//$inv->bureau=$bur;
    		$inv->save();
    		}
    		else 
    		{
    			$inv= new Inventorier();
    			$inv->codebien=$id;
    			$inv->anneeinv=date('Y');
    			$inv->comptage2=1;
    			$inv->bureau=$bur;
    			$inv->save();
    		}
    		
    		}
    		
    		
    		 $querystr = Structure::find();
    		
    		$dataProviderstr = new ActiveDataProvider([
    				'query' => $querystr,
    				]);
    		
    		$modelsstr=$dataProviderstr->getModels();
    		foreach ($modelsstr as $rowstr)
    		{
    		if(intval($model->codestructure)==$rowstr->codestructure)
    		{
    		$model->designationstructure=$rowstr->designation;
    		}
    		}
    		
    		$searchModelbur = new BureauSearch();
    		$dataProviderbur = $searchModelbur->search(Yii::$app->request->queryParams);
    		$modelsbur=$dataProviderbur->getModels();
    		foreach ($modelsbur as $rowbur)
    		{
    		
    			if($rowbur->codestructure == intval($model->codestructure))
    			{
    			
    				$searchModelaff = new AffecterSearch();
    				$dataProvideraff = $searchModelaff->searchCodbur(Yii::$app->request->queryParams,$rowbur->codebureau);
    				$modelsaff = $dataProvideraff->getModels();
    		
    				foreach ($modelsaff as $rowaff)
    				{
    					//searchConsultationBienSelonCode
    					
    					$searchModelbien = new BienSearch();
    					$dataProviderbien = $searchModelbien->searchConsultationBienSelonCodestatut(Yii::$app->request->queryParams, $rowaff->codebien);
    					$modelbien=$dataProviderbien->getModels();
    					 
    					foreach ($modelbien as $rowbien)
    					{
    						
    						if($rowbien->statutbien=="affecte")
    						{
    							$modeltrouv = Inventorier::findOne($rowbien->codebien);
    							
    							if ((($modeltrouv = Inventorier::findOne($rowbien->codebien)) == null)||($modeltrouv->comptage2==null))
    								{
    								$data[$i] = ['codebien'=>$rowbien->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$rowbur->codebureau,'etat'=>$rowbien->etatbien,];
    								$i++;
    							    }
    						}
    						else
    						{
    							
    							if($rowbien->statutbien=="transfere")
    							{
    		
    								$bur=$this->dernierTransfert($rowbien->codebien);
    								$modeltrouv = Inventorier::findOne($rowbien->codebien);
    							if ((($modeltrouv = Inventorier::findOne($rowbien->codebien)) == null)||($modeltrouv->comptage2==null))
    								{      							
    									
    									$data[$i] = ['codebien'=>$rowbien->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$bur,'etat'=>$rowbien->etatbien,];
    									$i++;
    								}
    							}
    						}
    					}
    				}
    			}
    		}
    		
    		$dataProviderRes = new ArrayDataProvider([
    				'allModels' => $data,
    				'key' =>'codebien',
    				'sort' => [
    				'attributes' => ['codebien','designation','bureau','etat',],
    					
    				],
    				]);
    		 
    		//  $modeltest=$dataProviderRes->getModels();
    		
    		$dataProvider=$dataProviderRes;
    		return $this->render('marquage2', [
    		
    				'searchModel' => $searchModel,
    				'dataProvider' => $dataProvider,
    				'model'=>$model,
    				]);
    		}
    	 
    
    
    	//  $modeltest=$dataProviderRes->getModels();
    	 
    	//$dataProvider=$dataProviderRes;
    
    	return $this->render('marquage2', [
    
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    }
    
    /***************************  Enregistrer comptage 03***************************************************************/
    public function actionEnregistrercomp3()
    {
    	$model= new Inventorier();
    	$data=null;
    	$searchModel = new InventorierSearch();
    	$i=0;
    	$dataProvider = $searchModel->searchInv(Yii::$app->request->queryParams,'0','0');
    	 
    
    		

    			$selection=(array)Yii::$app->request->post('selection');
    		
    		foreach($selection as $id)
    		{
    		$query = Bien::find()->where(['codebien'=>$id]);
    		$dataProvider1 = new ActiveDataProvider([
    				'query' => $query,
    				]);
    		 
    		$models1=$dataProvider1->getModels();
    		foreach ($models1 as $row1)
    		{
    		if($row1->statutbien=="transferer")
    		{
    		$bur=$this->dernierTransfert($row1->codebien);
    		}
    		if($row1->statutbien=="affecter")
    		{
    		$query = Affecter::find()->where(['codebien'=>$id]);
    		$dataProvidera = new ActiveDataProvider([
    				'query' => $query,
    				]);
    		
    		$modelsa=$dataProvidera->getModels();
    		foreach ($modelsa as $rowa)
    		{
    		$bur=$rowa->codebureau;
    		}
    		
    		}
    		 
    		}
    		 
    		/************************************enregistrement au niveau de la table inventorier **********************************/
    			
    			  
    	
    		if((($inv = Inventorier::findOne($id)) !== null))
    		{
    	    $inv->codebien=$id;
    		$inv->anneeinv=date('Y');
    		$inv->comptage3=1;
    		$inv->bureau=$bur;
    		$inv->save();
    		}
      		}
      		if ($model->load(Yii::$app->request->post()))
      		{
    		 $querystr = Structure::find();
    		
    		$dataProviderstr = new ActiveDataProvider([
    				'query' => $querystr,
    				]);
    		
    		$modelsstr=$dataProviderstr->getModels();
    		foreach ($modelsstr as $rowstr)
    		{
    		if(intval($model->codestructure)==$rowstr->codestructure)
    		{
    		$model->designationstructure=$rowstr->designation;
    		}
    		}
    		
    		$searchModelbur = new BureauSearch();
    		$dataProviderbur = $searchModelbur->search(Yii::$app->request->queryParams);
    		$modelsbur=$dataProviderbur->getModels();
    		foreach ($modelsbur as $rowbur)
    		{
    		
    			if($rowbur->codestructure == intval($model->codestructure))
    			{
    			
    				$searchModelaff = new AffecterSearch();
    				$dataProvideraff = $searchModelaff->searchCodbur(Yii::$app->request->queryParams,$rowbur->codebureau);
    				$modelsaff = $dataProvideraff->getModels();
    		
    				foreach ($modelsaff as $rowaff)
    				{
    					//searchConsultationBienSelonCode
    					
    					$searchModelbien = new BienSearch();
    					$dataProviderbien = $searchModelbien->searchConsultationBienSelonCodestatut(Yii::$app->request->queryParams, $rowaff->codebien);
    					$modelbien=$dataProviderbien->getModels();
    					 
    					foreach ($modelbien as $rowbien)
    					{
    						
    						if($rowbien->statutbien=="affecter")
    						{
    							$modeltrouv = Inventorier::findOne($rowbien->codebien);
    							
    							if ((($modeltrouv = Inventorier::findOne($rowbien->codebien)) == null)||(($modeltrouv->comptage2==1)&&($modeltrouv->comptage1==1)&&($modeltrouv->comptage3!==1)))
    								{
    								$data[$i] = ['codebien'=>$rowbien->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$rowbur->codebureau,'etat'=>$rowbien->etatbien,];
    								$i++;
    							    }
    						}
    						else
    						{
    							
    							if($rowbien->statutbien=="transferer")
    							{
    		
    								$bur=$this->dernierTransfert($rowbien->codebien);
    								$modeltrouv = Inventorier::findOne($rowbien->codebien);
    							if ((($modeltrouv = Inventorier::findOne($rowbien->codebien)) == null)||(($modeltrouv->comptage2==1)&&($modeltrouv->comptage1==1)&&($modeltrouv->comptage3!==1)))
    								{      							
    									
    									$data[$i] = ['codebien'=>$rowbien->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$bur,'etat'=>$rowbien->etatbien,];
    									$i++;
    								}
    							}
    						}
    					}
    				}
    			}
    		}
    		
    		$dataProviderRes = new ArrayDataProvider([
    				'allModels' => $data,
    				'key' =>'codebien',
    				'sort' => [
    				'attributes' => ['codebien','designation','bureau','etat',],
    					
    				],
    				]);
    		     		
    		$dataProvider=$dataProviderRes;
    		return $this->render('marquage3', [
    		
    				'searchModel' => $searchModel,
    				'dataProvider' => $dataProvider,
    				'model'=>$model,
    				]);
    		}
    	
    
    	return $this->render('marquage3', [
    
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    }
    
    /*************** ajouter un bien trouver dans un autre bureau *********************************************/
public function actionAjout1()
    {  
    	$model = new Inventorier();
    	
    	if ($model->load(Yii::$app->request->post()))
    	{  
    		
    		//if (($model5 = Bureau::findOne($model->codebureau)) !== null) {
    		  //  		echo"test";
    		$model2= Inventorier::findOne($model->codebien);
    		
    		if (($model2 = Inventorier::findOne($model->codebien)) !== null) {
    		if($model2->comptage1!='1' && $model2->comptage2=='1')
    		{
    			$model2->comptage1='1';
    			$model2->comptage2='1';
    		    $model2->anneeinv=date('Y');
    		    $model2->bureau=$model->bureau;
    		$model2->save();
    		\Yii::$app->getSession()->setFlash('success', 'Ajout avec succée.');
    		
    		}
    		}
    		if (($model2 = Inventorier::findOne($model->codebien)) == null) {
    			
    				$model->comptage1='1';
    				$model->anneeinv=date('Y');
    				$model->save();
    				\Yii::$app->getSession()->setFlash('success', 'Ajout avec succée.');
    			
    		}   		
    			 
    		}//}
    		
    		return $this->render('ajout', [
    				'model' => $model,
    				]);
    
    	}
    
public function actionAjout2()
    {  
    	$model = new Inventorier();
    
    	if ($model->load(Yii::$app->request->post()))
    	{  
    		$model2= Inventorier::findOne($model->codebien);
    		if (($model2 = Inventorier::findOne($model->codebien)) !== null) {
    		if($model2->comptage1=='1' && $model2->comptage2!='1')
    		{
    			$model2->comptage1='1';
    			$model2->comptage2='1';
    		    $model2->anneeinv=date('Y');
    		    $model2->bureau=$model->bureau;
    		$model2->save();
    		\Yii::$app->getSession()->setFlash('success', 'Ajout avec succée.');
    		
    		}
    		}
    		if (($model2 = Inventorier::findOne($model->codebien)) == null) {
    			
    				$model->comptage2='1';
    				$model->anneeinv=date('Y');
    				$model->save();
    				\Yii::$app->getSession()->setFlash('success', 'Ajout avec succée.');
    			
    		}   		
    			 
    		}
    		return $this->render('ajout2', [
    				'model' => $model,
    				]);
    
    	}
    
    public function actionAjout3()
    {  
    	$model = new Inventorier();
    
    	if ($model->load(Yii::$app->request->post()))
    	{  
    		$model2= Inventorier::findOne($model->codebien);
    		if (($model2 = Inventorier::findOne($model->codebien)) !== null) {
    		if($model2->comptage1=='1' && $model2->comptage2=='1')
    		{
    			$model2->comptage1='1';
    			$model2->comptage2='1';
    			$model2->comptage3='1';
    		    $model2->anneeinv=date('Y');
    		    $model2->bureau=$model->bureau;
    		$model2->save();
    		\Yii::$app->getSession()->setFlash('success', 'Ajout avec succée.');
    		
    		}
    		}
    		else 
    		{
    			\Yii::$app->getSession()->setFlash('info', 'SVP enregistrer le premier et le deuxième comptage.');
    			 
    		}
    
    	}
    
    
    	return $this->render('ajout3', [
    			'model' => $model,
    			]);
    
    }
    
    /***************************  Consulter ecart entre les comptages ***************************************************************/
    public function actionAfficherecartcomptage()
    {
    	$i=0;
    	$cpt1=0;
    	$cpt2=0;
    	$cpttotal=0;
    	$cptstr=0;
    	$data=null;
    	$model= new Inventorier();
    	$searchModel = new InventorierSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$cpttotal=$dataProvider->getTotalCount();
    	$models=$dataProvider->getModels();
    	
    	/**************************traiter ecart entre les deux comptages **************************************/
    	
    	$selection=(array)Yii::$app->request->post('selection');//typecasting
    	
    	foreach($selection as $id)
    	{
    		$modeltr=$this->findModel($id);
    		$modeltr->comptage1='1';
    		$modeltr->comptage2='1';
    		$modeltr->save();
    		
    		
    		
    	}
    	
    	if ($model->load(Yii::$app->request->post()))
    	{
    		$querystr = Structure::find();
    		
    		$dataProviderstr = new ActiveDataProvider([
    				'query' => $querystr,
    				]);
    		$modelsstr=$dataProviderstr->getModels();
    		foreach ($modelsstr as $rowstr)
    		{
    			if(intval($model->codestructure)==$rowstr->codestructure)
    			{
    				$model->designationstructure=$rowstr->designation;
    			}
    		}
    		
    		$searchModelbur = new BureauSearch();
    		$dataProviderbur = $searchModelbur->search(Yii::$app->request->queryParams);
    		$modelsbur=$dataProviderbur->getModels();
    		foreach ($modelsbur as $rowbur)
    		{
    			if($rowbur->codestructure == intval($model->codestructure))
    			{
    				$searchModelaff = new AffecterSearch();
    				$dataProvideraff = $searchModelaff->searchCodbur(Yii::$app->request->queryParams,$rowbur->codebureau);
    				$modelsaff = $dataProvideraff->getModels();
    		
    				foreach ($modelsaff as $rowaff)
    				{
    					$searchModelbien = new BienSearch();
    					$dataProviderbien = $searchModelbien->searchConsultationBienSelonCodestatut(Yii::$app->request->queryParams, $rowaff->codebien);
    					$modelbien=$dataProviderbien->getModels();
    		
    					foreach ($modelbien as $rowbien)
    					{
    		
    						if($rowbien->statutbien=="affecte")
    						{
    							$modeltrouv = Inventorier::findOne($rowbien->codebien);
    				           				
    							if ((($modeltrouv = Inventorier::findOne($rowbien->codebien)) !== null))
    								{ 
    									$cptstr++;
    									if(($modeltrouv->comptage1!=='1'&&$modeltrouv->comptage2=='1')||($modeltrouv->comptage1=='1'&&$modeltrouv->comptage2!=='1'))
    									{ 
    										if(($modeltrouv->comptage1=='1'&&$modeltrouv->comptage2=='1'))
    										{
    											
    										}
    										else
    										{
    								$data[$i] = ['codebien'=>$rowbien->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$rowbur->codebureau,'etat'=>$rowbien->etatbien,];
    								    $i++;
    								    $cpt1++;
    										}
    									}
    							}
    						}
    						else
    						{
    								
    							if($rowbien->statutbien=="transfere")
    							{
    								$bur=$this->dernierTransfert($rowbien->codebien);
    								$modeltrouv = Inventorier::findOne($rowbien->codebien);
    								
    								if ((($modeltrouv = Inventorier::findOne($rowbien->codebien)) !== null))
    								{ $cptstr++;
    									if(($modeltrouv->comptage1=='1'&&$modeltrouv->comptage2!=='1')||($modeltrouv->comptage1!=='1'&&$modeltrouv->comptage2=='1'))
    									   {
    										if(($modeltrouv->comptage1=='1'&&$modeltrouv->comptage2=='1')){
    												
    										}
    										else
    										{
    									
    									$data[$i] = ['codebien'=>$rowbien->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$bur,'etat'=>$rowbien->etatbien,];
    									$i++;
    									$cpt1++;
    										
    										}
    									}
    								}
    							}
    						}
    					}
    				}
    			}
    		}
    		$prc=0;
    		if($cptstr!=0)
    		{ 
    		$prc=($cpt1)/$cptstr;
    		$prc=$prc*100;
    		}
    		$prc=number_format($prc, 2, ',', ' ');
    		
    		$model->pourcentageecart=$prc." %";
    		
    		$dataProviderRes = new ArrayDataProvider([
    				'allModels' => $data,
    				'key' =>'codebien',
    				'sort' => [
    				'attributes' => ['codebien','designation','bureau','etat',],
    					
    				],
    				]);
    		 
    		//  $modeltest=$dataProviderRes->getModels();
    		
    		$dataProvider=$dataProviderRes;
    		
    	}
    	
    	else {
    		
    		
    	foreach ($models as $row)
    	{
    		if(($row->comptage1=='1'&&$row->comptage2!='1'))
    		{ 
    			$rowbien=Bien::findOne($row->codebien); 
    			$data[$i] = ['codebien'=>$row->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$row->bureau,'etat'=>$rowbien->etatbien,];
    			$i++;
    			$cpt1++; 
    		}
    		else
    		{

    		if($row->comptage1!='1' && $row->comptage2=='1')
    		{
    			$rowbien=Bien::findOne($row->codebien); 
    			$data[$i] = ['codebien'=>$row->codebien, 'designation'=>$rowbien->designationbien,'bureau'=>$row->bureau,'etat'=>$rowbien->etatbien,];
    			$i++;
    			$cpt1++;
    		}
    		}
    		
    	}
    	$prc=0;
    	if ($cpttotal!=0)
    	$prc=($cpt1)/$cpttotal;
    	$prc=$prc*100;
    	
    	$seuil=0;
    	$modelin=new Exerciceinventaire();
    	$searchModelexerc= new ExerciceinventaireSearch();
    	$dataProviderexerc = $searchModelexerc->search(Yii::$app->request->queryParams);
    	
    		$modelsexerc=$dataProviderexerc->getModels();
    		foreach ($modelsexerc as $rowex)
    		{ 
    			if($rowex->anneeinv==date('Y'))
    			{
    				
    				$seuil=$rowex->seuil_compte;
    				if($seuil<=$prc)
    				{
    					\Yii::$app->getSession()->setFlash('info', "L'écart entre les deux comptage est arrivé au seil, Vous devez passer au troisième comptage.");
    						
    				}
    			}
    			
    		}
    		$prc=number_format($prc, 2, ',', ' ');
    		
    		$prc=$prc." %";
    		$model->pourcentageecart=$prc;
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'key' =>'codebien',
    			'sort' => [
    			'attributes' => ['codebien','designation','bureau','etat',],
    				
    			],
    			]);
    	 
    	//  $modeltest=$dataProviderRes->getModels();
    	
    	$dataProvider=$dataProviderRes;
    	
    	
    	}
    	 
    	    	return $this->render('extraireEcartComptage', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    }
    
    /*************************** valider inventaire physique***************************************************************/
    
    public function actionValiderinvph()
    {
    	$model= new Inventorier();
    	$searchModel = new InventorierSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $models= $dataProvider->getModels();
        foreach($models as $row)
        {
        	if(($row->comptage1=='1')&&($row->comptage2=='1') )
        	{
        		$resinv=$this->findModel($row->codebien);
        		$resinv->inventairephysic='1';
        		$resinv->save();
        	}
        } 
         
    	$data=null;
    	$searchModel = new InventorierSearch();
    	$i=0;
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$modelinv=$dataProvider->getModels();
    	foreach ($modelinv as $row)
    	{
    		$bien=Bien::findOne($row->codebien);
    			if(($row->comptage1=='1')&&($row->comptage2=='1') )
    		{
    			$data[$i] = ['codebien'=>$row->codebien, 'designation'=>$bien->designationbien,'etat'=>$bien->etatbien,'bureau'=>$row->bureau,];
    			$i++;
    		}
    	}
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'key' =>'codebien',
    			'sort' => [
    			'attributes' => ['codebien','designation','bureau'],
    			],
    			]);
    	
    	\Yii::$app->getSession()->setFlash('success', 'Validation avec succée.');
    	 
    	
    	$dataProvider=$dataProviderRes;
    	return $this->render('consulterinvph', [
    			//	'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    }
    
    /***************************  extraire ecart entre l'inventaire thèorique et l'inventaire physique ***************************************************************/
    public function actionExtraireecartthph()
    {
    	$i=0;
    	$cpt=0;
    	$cptstr=0;
    	$model= new Inventorier();
    	$data=null;
    	$searchModel = new InventorierSearch();
    	$dataProvider = $searchModel->searchInvph(Yii::$app->request->queryParams);
    	$models= $dataProvider->getModels();
    
    	 	if ($model->load(Yii::$app->request->post()))
    	{
    		$querystr = Structure::find();
    		
    		$dataProviderstr = new ActiveDataProvider([
    				'query' => $querystr,
    				]);
    		
    		$modelsstr=$dataProviderstr->getModels();
    		foreach ($modelsstr as $rowstr)
    		{
    			if(intval($model->codestructure)==$rowstr->codestructure)
    			{
    				$model->designationstructure=$rowstr->designation;
    			}
    		}
    		
    		
    		
    		
    		
    		/***/
    		$query = Bien::find();
    		$dataProviderb = new ActiveDataProvider(['query' => $query,]);
    		$modelsb=$dataProviderb->getModels();
    		foreach($modelsb as $rowb)
    		{
    			
    			$cp=substr(''.$rowb->codebien, 0, 3);
    			if(($cp!=("211")) && ($cp!=("212")) && ($cp!=("213")))
    			{
    			if($rowb->statutbien=="areformer"||$rowb->statutbien=="affecte"||$rowb->statutbien=="en reparation"||$rowb->statutbien=="transfere")
    			{  
    				if(($modeli = Inventorier::findOne($rowb->codebien))!== null)
    				{
    					if($rowb->statutbien=='affecte')
    					{
    						$modelaff = Affecter::findOne($rowb->codebien);
    						$bur=$modelaff->codebureau; 	
    					}
    					else
    					{
    						$bur=$this->dernierTransfert($rowb->codebien);
    					}
    					if(($modeli->bureau!==$bur)&&($modeli->bureau!==null)&&($bur!=null))
    					{
    						$model->codebien=$rowb->codebien;
    						$motif="transféré de Bureau ".$bur." au Bureau ".$modeli->bureau;
    						$modelstr = Bureau::findOne($bur);
    						$cdstr="".$model->codestructure;
    						$cdstr2="".$modelstr->codestructure;
    						$comp=strcmp($cdstr , $cdstr2);echo "ici ".$comp;
    						if($comp ==0 )
    						{  echo "ici ";
    						$data[$i] = ['codebien'=>$rowb->codebien, 'designation'=>$rowb->designationbien,'etat'=>$rowb->etatbien,'bureau'=>$bur,'statutbien'=>$motif,];
    						$i++;
    						}
    						$motif=null;
    					}
    					
    					/*else
    					{
    					$data[$i] = ['codebien'=>$rowb->codebien, 'designation'=>$rowb->designationbien,'etat'=>$rowb->etatbien,];
    					$i++;
    					}*/
    					
    				}
    				else
    				{
    					$bur=null;
    					if($rowb->statutbien=='affecte')
    					{
    						$modelaff = Affecter::findOne($rowb->codebien);
    						if(Affecter::findOne($rowb->codebien) !== null)
    						{
    							$bur=$modelaff->codebureau;
    						}
    					}
    					else
    					{
    						if($rowb->statutbien=="en reparation")
    						{
    							$bur=$this->dernierTransfert($rowb->codebien);
    							if(($bur)== null)
    							{
    								$modelaff = Affecter::findOne($rowb->codebien);
    								if(Affecter::findOne($rowb->codebien) !== null)
    								{
    									$bur=$modelaff->codebureau;
    								}
    							}
    						}
    						else
    						{
    							$bur=$this->dernierTransfert($rowb->codebien);
    						}
    					}
    		
    					$modelstr = Bureau::findOne($bur);
    					if(strcmp($model->codestructure,$modelstr->codestructure)==0)
    					{
    						$modelstr = Bureau::findOne($bur);
    						$cdstr=$model->codestructure;
    						$cdstr2=$modelstr->codestructure;
    						if($cdstr == $cdstr2)
    						{
    					$data[$i] = ['codebien'=>$rowb->codebien, 'designation'=>$rowb->designationbien,'etat'=>$rowb->etatbien,'bureau'=>$bur,'statutbien',];
    					$i++;
    					$cptstr++;
    					    }
    					}
    					 
    				}
    			}
    		}
    	}
    		/***/
    		
    	
    	}
    	else{
    	
    		$query = Bien::find();
    		$dataProviderb = new ActiveDataProvider(['query' => $query,]);
    		$modelsb=$dataProviderb->getModels();
    		foreach($modelsb as $rowb)
    		{
    			if($rowb->statutbien=="areformer"||$rowb->statutbien=="affecte"||$rowb->statutbien=="en reparation"||$rowb->statutbien=="transfere")
    			{
    			if(($modeli = Inventorier::findOne($rowb->codebien))!== null) 
    			{
    				if($rowb->statutbien=='affecte')
                     {
                     	$modelaff = Affecter::findOne($rowb->codebien);
                      	$bur=$modelaff->codebureau;
                     }
else
{
 	$bur=$this->dernierTransfert($rowb->codebien);
}
    				if(($modeli->bureau!==$bur)&&($modeli->bureau!==null)&&($bur!=null))
    				{  
    					$model->codebien=$rowb->codebien;
    					$motif="transféré de Bureau ".$bur." au Bureau ".$modeli->bureau;
    					$cp=substr(''.$rowb->codebien, 0, 3);
    					if(($cp!=("211")) && ($cp!=("212")) && ($cp!=("213")))
    					{
    					$data[$i] = ['codebien'=>$rowb->codebien, 'designation'=>$rowb->designationbien,'etat'=>$rowb->etatbien,'bureau'=>$bur,'statutbien'=>$motif,];
    					$i++;
    					$motif=null;
    					$cp=null;
    					}
    				}
/*else
{
	$data[$i] = ['codebien'=>$rowb->codebien, 'designation'=>$rowb->designationbien,'etat'=>$rowb->etatbien,];
	$i++;
}*/
    			}      			
    			else 
    			{ 
    				$bur=null;
    				if($rowb->statutbien=='affecte')
    				{
    					$modelaff = Affecter::findOne($rowb->codebien);
    					if(Affecter::findOne($rowb->codebien) !== null)
    					{
    					$bur=$modelaff->codebureau;
    					}
    				}
    				else
    				{
    					if($rowb->statutbien=="en reparation")
    					{
    						$bur=$this->dernierTransfert($rowb->codebien);
    						if(($bur)== null)
    						{
    							$modelaff = Affecter::findOne($rowb->codebien);
    							if(Affecter::findOne($rowb->codebien) !== null)
    							{
    								$bur=$modelaff->codebureau;
    							}	
    						}
    					}
    					else
    					{
    					$bur=$this->dernierTransfert($rowb->codebien);
    					}
    				}   
    				$cp=substr(''.$rowb->codebien, 0, 3);
    				if(($cp!=("211")) && ($cp!=("212")) && ($cp!=("213")))
    				{	    			
               $data[$i] = ['codebien'=>$rowb->codebien, 'designation'=>$rowb->designationbien,'etat'=>$rowb->etatbien,'bureau'=>$bur,'statutbien',];
               $i++;
               $cpt++;
               $cp=null;
    				}
    			}
    		}
    		}
    	}
    		$model->ecarttotal=$cpt;
    		$model->ecartstr=$cptstr;
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'key' =>'codebien',
    			'sort' => [
    			'attributes' => ['codebien','designation','etat','bureau','statutbien',],
    			],
    			]);
      $dataProvider=$dataProviderRes;
      return $this->render('extraireEcartThPh', [
    		//	'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    }
    
    
    /***************************** Afficher comptage 01  ******************************************************************/
    
    public function actionAffichercomp()
    {
       	$model= new Inventorier();
    	$data=null;
    	$searchModel = new InventorierSearch();
    	$i=0;
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$modelinv=$dataProvider->getModels();
    	foreach ($modelinv as $row)
    	{
    		$bien=Bien::findOne($row->codebien);
    		if($row->comptage1=="1")
    		{
    		$data[$i] = ['codebien'=>$row->codebien, 'designation'=>$bien->designationbien,'etat'=>$bien->etatbien,'bureau'=>$row->bureau,];
    		$i++;
    		}
    		
    	}
    	
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'key' =>'codebien',
    			'sort' => [
    			'attributes' => ['codebien','designation','bureau'],
    			],
    			]);
    	$dataProvider=$dataProviderRes;
    	return $this->render('consulterCmpt1', [
    			//	'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    	
    }    
    
/********************* Afficher comptage 02 **************************************************************************************/
    

    public function actionAffichercomp2()
    {
    	$model= new Inventorier();
    	$data=null;
    	$searchModel = new InventorierSearch();
    	$i=0;
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$modelinv=$dataProvider->getModels();
    	foreach ($modelinv as $row)
    	{
    		$bien=Bien::findOne($row->codebien);
    		if($row->comptage2=="1")
    		{
    		$data[$i] = ['codebien'=>$row->codebien, 'designation'=>$bien->designationbien,'etat'=>$bien->etatbien,'bureau'=>$row->bureau,];
    		$i++;
    		}
    	}
    	 
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'key' =>'codebien',
    			'sort' => [
    			'attributes' => ['codebien','designation','bureau'],
    			],
    			]);
    	$dataProvider=$dataProviderRes;
    	return $this->render('consulterCmpt2', [
    			//	'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    	 
    }
    

    /********************* Afficher comptage 03 ****************************************************************************/
    
    
    public function actionAffichercomp3()
    {
    	$model= new Inventorier();
    	$data=null;
    	$searchModel = new InventorierSearch();
    	$i=0;
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$modelinv=$dataProvider->getModels();
    	foreach ($modelinv as $row)
    	{
    		$bien=Bien::findOne($row->codebien);
    		if($row->comptage3=="1")
    		{
    			$data[$i] = ['codebien'=>$row->codebien, 'designation'=>$bien->designationbien,'etat'=>$bien->etatbien,'bureau'=>$row->bureau,];
    			$i++;
    		}
    	}
    
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'key' =>'codebien',
    			'sort' => [
    			'attributes' => ['codebien','designation','bureau'],
    			],
    			]);
    	$dataProvider=$dataProviderRes;
    	return $this->render('consulterCmpt3', [
    			//	'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    
    }
    
    /********************* Afficher inventaire physique  ****************************************************************************/
    
    
    public function actionAfficherinvph()
    {
    	$model= new Inventorier();
    	$data=null;
    	$searchModel = new InventorierSearch();
    	$i=0;
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	$modelinv=$dataProvider->getModels();
    	foreach ($modelinv as $row)
    	{
    		$bien=Bien::findOne($row->codebien);
    			if(($row->comptage1=='1')&&($row->comptage2=='1') )
    		{
    			$data[$i] = ['codebien'=>$row->codebien, 'designation'=>$bien->designationbien,'etat'=>$bien->etatbien,'bureau'=>$row->bureau,];
    			$i++;
    		}
    	}
    	$dataProviderRes = new ArrayDataProvider([
    			'allModels' => $data,
    			'key' =>'codebien',
    			'sort' => [
    			'attributes' => ['codebien','designation','bureau'],
    			],
    			]);
    	$dataProvider=$dataProviderRes;
    	return $this->render('consulterinvph', [
    			//	'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    			'model'=>$model,
    			]);
    
    }
    
    
}
