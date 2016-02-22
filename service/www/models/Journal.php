<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "journals".
 *
 * @property integer $id
 * @property integer $journalized_id
 * @property string $journalized_type
 * @property integer $user_id
 * @property string $notes
 * @property string $created_on
 * @property integer $private_notes
 */
class Journal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'journals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['journalized_id', 'user_id', 'private_notes'], 'integer'],
            [['notes'], 'string'],
            [['created_on'], 'required'],
            [['created_on'], 'safe'],
            [['journalized_type'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'journalized_id' => 'Journalized ID',
            'journalized_type' => 'Journalized Type',
            'user_id' => 'User ID',
            'notes' => 'Notes',
            'created_on' => 'Created On',
            'private_notes' => 'Private Notes',
        ];
    }
}
