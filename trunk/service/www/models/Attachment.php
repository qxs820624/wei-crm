<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attachments".
 *
 * @property integer $id
 * @property integer $container_id
 * @property string $container_type
 * @property string $filename
 * @property string $disk_filename
 * @property string $filesize
 * @property string $content_type
 * @property string $digest
 * @property integer $downloads
 * @property integer $author_id
 * @property string $created_on
 * @property string $description
 * @property string $disk_directory
 */
class Attachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attachments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['container_id', 'filesize', 'downloads', 'author_id'], 'integer'],
            [['created_on'], 'safe'],
            [['container_type'], 'string', 'max' => 30],
            [['filename', 'disk_filename', 'content_type', 'description', 'disk_directory'], 'string', 'max' => 255],
            [['digest'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'container_id' => 'Container ID',
            'container_type' => 'Container Type',
            'filename' => 'Filename',
            'disk_filename' => 'Disk Filename',
            'filesize' => 'Filesize',
            'content_type' => 'Content Type',
            'digest' => 'Digest',
            'downloads' => 'Downloads',
            'author_id' => 'Author ID',
            'created_on' => 'Created On',
            'description' => 'Description',
            'disk_directory' => 'Disk Directory',
        ];
    }
}
