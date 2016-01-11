<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exerciceinventaire".
 *
 * @property string $anneeinv
 * @property string $seuil_compte
 */
class Exerciceinventaire extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exerciceinventaire';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anneeinv'], 'required'],
            [['anneeinv', 'seuil_compte'], 'number'],
            [['anneeinv'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'anneeinv' => 'Anneeinv',
            'seuil_compte' => 'Seuil Compte',
        ];
    }
}
