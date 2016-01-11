<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reformer".
 *
 * @property string $datereforme
 * @property string $codebien
 * @property integer $idintervenant
 * @property string $typereforme
 * @property string $titre
 * @property double $prixvente
 * @property string $booleann
 */
class Reformer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reformer';
    }
    public function attributes()
    {
    	 
    	return array_merge( parent::attributes() , ['designationbien','designation bien','anneeRef','date acquisition','actif brut','amortissement pratiquee','valeur nette',
    			'prix cession','plus value','moins value', 'unité','type reforme',
    			'dat ereforme',]);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien'], 'required'],
            [['codebien'], 'integer'],
            [[ 'prixvente'], 'number'],
          //  [['idintervenant'], 'integer'],
            [['datereforme','anneeRef'], 'string', 'max' => 10],
            [['typereforme', 'booleann'], 'string', 'max' => 20],
            [['titre', 'designationbien'], 'string', 'max' => 185],
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
            'titre' => 'Titre',
            'typereforme' => 'Type reforme',
            'datereforme' => 'Date reforme',
            'prixvente' => 'Prix cession',
            'booleann' => 'Boolean',
            'designationbien' => 'Désignation',
            'anneeRef'=>' Année de la réforme',
            'unité'=> 'Unité',
        ];
    }
}
