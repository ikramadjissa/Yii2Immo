<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instance".
 *
 * @property string $codebien
 * @property string $dt
 * @property string $statutbien
 */
class Instance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instance';
    }

    /**
     * @inheritdoc
     */
    


    public function attributes()
    {
    
    	return array_merge( parent::attributes() , ['designationbien','codesousfamille','numfacture']);
    }
    public function rules()
    {
        return [
            [['codebien', 'dt'], 'required'],
         
            [['codebien','numfacture'], 'number'],
            [['dt','designationbien','codesousfamille','codestructure'], 'string'],
            [['dt'], 'string', 'max' => 10],
            [['status'], 'string', 'max' => 128],
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
            'dt' => 'Date mise en instance',
            'designationbien'=>'Désignation',
            'codesousfamille'=>'Sous famille',
            'numfacture'=>'Numéro facture',
            'status'=>'Status',
        ];
    }
}
