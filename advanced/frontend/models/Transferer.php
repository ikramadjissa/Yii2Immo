<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transferer".
 *
 * @property string $codebien
 * @property string $motif
 * @property string $dt
 * @property string $codebureau
 */
class Transferer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transferer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codebien', 'dt','codebureau'], 'required'],
            [['codebien'], 'number'],
            [['motif'], 'string', 'max' => 255],
            [['dt'], 'string', 'max' => 10],
            [['codebureau'], 'string', 'max' => 10],
           // [['codebien','dt','codebureau'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codebien' => 'Code bien',
            'motif' => 'Motif du transfert',
            'dt' => 'Date du transfert',
            'codebureau' => 'Bureau actuel',
        ];
    }
}
