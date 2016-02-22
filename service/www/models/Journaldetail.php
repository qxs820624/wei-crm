<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journal_details".
 *
 * @property integer $id
 * @property integer $journal_id
 * @property string $property
 * @property string $prop_key
 * @property string $old_value
 * @property string $value
 */
class Journaldetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'journal_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['journal_id'], 'integer'],
            [['old_value', 'value'], 'string'],
            [['property', 'prop_key'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'journal_id' => 'Journal ID',
            'property' => 'Property',
            'prop_key' => 'Prop Key',
            'old_value' => 'Old Value',
            'value' => 'Value',
        ];
    }
}
