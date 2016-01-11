<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "affecter".
 *
 * @property string $codebureau
 * @property string $codebien
 * @property string $dt
 * @property integer $numAffectation
 */
class Affecter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'affecter';
    }

    public function attributes()
    {
    
    	return array_merge( parent::attributes() , ['designationbien']);
    }
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebureau', 'codebien', 'dt', 'numAffectation'], 'required'],
            [['codebien'], 'number'],
            [['numAffectation'], 'integer'],
            [['codebureau'], 'string', 'max' => 10],
        
            [['dt'], 'string', 'max' => 10],
            [['codebureau', 'codebien', 'dt' , 'numAffectation'], 'unique', 'targetAttribute' => ['codebureau', 'codebien', 'dt' , 'numAffectation'], 'message' => 'The combination of Codebureau, Codebien and Dt has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codebureau' => 'Code bureau:',
            'codebien' => 'Code bien:',
            'dt' => "Date d'affectation:",
            'numAffectation' => "Numéro d'affectation:",
            'designationbien' => 'Désignation',
        ];
    }
}
