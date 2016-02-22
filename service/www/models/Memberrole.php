<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_roles".
 *
 * @property integer $id
 * @property integer $member_id
 * @property integer $role_id
 * @property integer $inherited_from
 */
class Memberrole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'role_id'], 'required'],
            [['member_id', 'role_id', 'inherited_from'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'role_id' => 'Role ID',
            'inherited_from' => 'Inherited From',
        ];
    }
}
