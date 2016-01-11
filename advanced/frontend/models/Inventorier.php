<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventorier".
 *
 * @property integer $codebien
 * @property integer $anneeinv
 * @property integer $comptage1
 * @property integer $comptage2
 * @property integer $comptage3
 * @property string $obs
 * @property string $bureau
 * @property string $inventairephysic
 */
class Inventorier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventorier';
    }
    
    public function attributes()
    {
    	return array_merge( parent::attributes() , [ 'situation','dateinventaire','codestructure','designationstructure','designation','etat','pourcentageecart', 'statut', 'ecartstr', 'ecarttotal']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien', 'anneeinv'], 'required'],
            [['codebien', 'anneeinv', 'comptage1', 'comptage2', 'comptage3','pourcentageecart','ecartstr', 'ecarttotal'], 'integer'],
            [['obs'], 'string', 'max' => 50],
            [['bureau', 'inventairephysic', 'situation','dateinventaire','codestructure','designationstructure', 'statut'], 'string', 'max' => 20],
            [['codebien'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codebien' => 'Code bien',
            'anneeinv' => 'Annee inventaire',
            'comptage1' => 'Comptage 1',
            'comptage2' => 'Comptage 2',
            'comptage3' => 'Comptage 3',
            'obs' => 'Observation',
            'bureau' => 'Bureau',
            'inventairephysic' => 'Inventaire physique',
            'codestructure'=>'Code structure',
            'designationstructure'=>'Designation structure',
            'pourcentageecart'=>'pourcentage ecart',
            'situation' => 'Situation',
            'statut' => 'Statut',
        ];
    }
}
