<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $id
 * @property string $name
 * @property integer $position
 * @property integer $assignable
 * @property integer $builtin
 * @property string $permissions
 * @property string $issues_visibility
 * @property string $users_visibility
 * @property string $time_entries_visibility
 * @property integer $all_roles_managed
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'assignable', 'builtin', 'all_roles_managed'], 'integer'],
            [['permissions'], 'string'],
            [['name', 'issues_visibility', 'users_visibility', 'time_entries_visibility'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
            'assignable' => 'Assignable',
            'builtin' => 'Builtin',
            'permissions' => 'Permissions',
            'issues_visibility' => 'Issues Visibility',
            'users_visibility' => 'Users Visibility',
            'time_entries_visibility' => 'Time Entries Visibility',
            'all_roles_managed' => 'All Roles Managed',
        ];
    }
}
