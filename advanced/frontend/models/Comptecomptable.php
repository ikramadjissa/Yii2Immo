<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comptecomptable".
 *
 * @property integer $codecomptecomptable
 * @property string $designationcomptecomptable
 * @property integer $comptecomptableref
 * @property string $designationccref
 * @property string $type
 */
class Comptecomptable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comptecomptable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecomptecomptable'], 'required'],
            [['codecomptecomptable', 'comptecomptableref'], 'integer'],
            [['designationcomptecomptable', 'designationccref'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20],
            [['codecomptecomptable'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codecomptecomptable' => 'Codecomptecomptable',
            'designationcomptecomptable' => 'Designationcomptecomptable',
            'comptecomptableref' => 'Comptecomptableref',
            'designationccref' => 'Designationccref',
            'type' => 'Type',
        ];
    }
}
