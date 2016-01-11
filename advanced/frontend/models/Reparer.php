<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reparer".
 *
 * @property string $codebien
 * @property string $num_reg
 * @property string $dt
 * @property integer $numreparation
 * @property string $datefin
 * @property string $motif
 */
class Reparer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	
	
    public static function tableName()
    {
        return 'reparer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien', 'num_reg', 'dt'], 'required'],
            [['codebien'], 'number'],
         
            [[ 'numreparation'], 'integer'],
            [['num_reg'], 'string', 'max' => 32],
            [['dt', 'datefin'], 'string', 'max' => 10],
            [['motif','codestructure'], 'string', 'max' => 255],
           
            [['codebien', 'num_reg', 'dt'], 'unique', 'targetAttribute' => ['codebien', 'num_reg', 'dt'], 'message' => 'The combination of Codebien, Num Reg and Dt has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codebien' => 'Code bien',
            'num_reg' => 'Code du prestataire',
          
            'dt' => 'Date sortie',
            'numreparation' => 'Numéro de réparation',
            'datefin' => 'Date d entrée',
            'motif' => 'Motif de réparation',
            
        ];
    }
}
