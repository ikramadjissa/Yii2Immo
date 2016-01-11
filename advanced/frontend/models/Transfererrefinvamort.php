<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "transfererrefinvamort".
 *
 * @property string $codecomptecomptable
 * @property string $dat
 * @property string $codecomptecomptableref
 * @property double $mnt
 */
class Transfererrefinvamort extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfererrefinvamort';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecomptecomptable', 'dat'], 'required'],
         
            [['codecomptecomptable', 'dat', 'codecomptecomptableref','mnt'], 'string'],
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
            'codecomptecomptableref' => 'Compte comptable r��forme',
            'dat' => 'Ann��e exercice',
            'mnt' => 'Montant',
        ];
    }
}
