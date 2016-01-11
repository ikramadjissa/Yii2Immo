<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comptecomptableamort".
 *
 * @property integer $codecomptecomptable
 * @property string $designationcomptecomptable
 * @property string $comptecomptableref
 * @property string $designationccref
 * @property string $type
 */
class Comptecomptableamort extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comptecomptableamort';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codecomptecomptable'], 'required'],
            [['codecomptecomptable'], 'integer'],
            [['designationcomptecomptable', 'comptecomptableref', 'designationccref', 'type'], 'string', 'max' => 20],
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
