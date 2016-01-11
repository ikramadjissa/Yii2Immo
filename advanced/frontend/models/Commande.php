<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "commande".
 *
 * @property integer $numcmd
 * @property string $datecmd
 */
class Commande extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commande';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numcmd'], 'required'],
            [['numcmd'], 'integer'],
            [['datecmd'], 'string', 'max' => 10],
            [['numcmd'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'numcmd' => 'Numcmd',
            'datecmd' => 'Datecmd',
        ];
    }
}
