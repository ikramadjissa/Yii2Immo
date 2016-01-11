<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "structure".
 *
 * @property string $codestructure
 * @property string $codestructure_struct_chef
 * @property string $typestructure
 * @property string $adressestruct
 * @property string $nomStruct
 */
class Structure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'structure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codestructure', 'designation'], 'required'],
            [['codestructure', 'codestructure_struct_chef'], 'string', 'max' => 11],
            [['typestructure', 'adressestruct'], 'string', 'max' => 255],
            [['designation'], 'string', 'max' => 255],
            [['codestructure'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codestructure' => 'Code structure',
            'codestructure_struct_chef' => 'Codestructure Struct Chef',
            'typestructure' => 'Type structure',
            'adressestruct' => 'Adresse struct',
       
            'designation'=>'Structure',
        ];
    }
}
