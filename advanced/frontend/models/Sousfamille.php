<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sousfamille".
 *
 * @property string $designationsousfamille
 * @property integer $codefamille
 * @property integer $codesousfamille
 */
class Sousfamille extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sousfamille';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codefamille', 'codesousfamille'], 'required'],
            [['codefamille'], 'number'],
            [['designationsousfamille'], 'string', 'max' => 128],
            [['designationfamille','codesousfamille'], 'string', 'max' => 255],
            
            [['codesousfamille'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'designationsousfamille' => 'Designation sous famille',
            'codefamille' => 'Code famille',
            'codesousfamille' => 'Code sous famille',
            'designationfamille'=>'Désignation famille',
            
        ];
    }
}
