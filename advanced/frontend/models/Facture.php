<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facture".
 *
 * @property integer $numfacture
 * @property string $regcomm
 * @property string $datefact

 * @property string $tva
 */
class Facture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numfacture', 'regcomm'], 'required'],
            [['numfacture'], 'integer'],
            [['tva'], 'number'],
            [['regcomm'], 'string', 'max' => 128],
            [['datefact'], 'string', 'max' => 10],
            [['numfacture'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'numfacture' => 'Numfacture',
            'regcomm' => 'Regcomm',
            'datefact' => 'Datefact',
            'tva' => 'Tva',
        ];
    }
}
