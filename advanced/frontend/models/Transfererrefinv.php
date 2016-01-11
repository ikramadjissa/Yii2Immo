<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "transfererrefinv".
 *
 * @property string $codecomptecomptable
 * @property string $codecomptecomptableref
 * @property string $dat
 * @property string $mnt
 */
class Transfererrefinv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfererrefinv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecomptecomptable', 'dat'], 'required'],
            [['codecomptecomptable', 'codecomptecomptableref', 'dat', 'mnt'], 'string', 'max' => 20],
            [['codecomptecomptable', 'dat'], 'unique', 'targetAttribute' => ['codecomptecomptable', 'dat'], 'message' => 'The combination of Codecomptecomptable and Dat has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codecomptecomptable' => 'Compte comptable',
            'codecomptecomptableref' => 'Compte comptable reforme',
            'dat' => 'Année exercice',
            'mnt' => 'Montant',
        ];
    }
}
