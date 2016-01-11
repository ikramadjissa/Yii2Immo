<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ecartpositif".
 *
 * @property integer $idecartpos
 * @property string $codebureau
 * @property string $anneeinv
 * @property string $designationecartpos
 */
class Ecartpositif extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecartpositif';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idecartpos', 'codebureau', 'anneeinv'], 'required'],
            [['idecartpos'], 'integer'],
            [['anneeinv'], 'number'],
            [['codebureau'], 'string', 'max' => 32],
            [['designationecartpos'], 'string', 'max' => 128],
            [['idecartpos'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idecartpos' => 'Idecartpos',
            'codebureau' => 'Codebureau',
            'anneeinv' => 'Anneeinv',
            'designationecartpos' => 'Designationecartpos',
        ];
    }
}
