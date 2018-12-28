<?php

namespace kouosl\duyuru\models;

use Yii;

/**
 * This is the model class for table "duyuru".
 *
 * @property int $id
 * @property string $title
 * @property string $duyuru
 * @property int $user_id
 * @property int $kat_id
 * @property string $status
 * @property int $sorted
 * @property string $started
 * @property string $ended
 * @property string $modified
 */
class Duyuru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'duyuru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'duyuru', 'user_id', 'kat_id', 'sorted', 'started', 'ended', 'modified'], 'required'],
            [['duyuru', 'status'], 'string'],
            [['user_id', 'kat_id', 'sorted'], 'integer'],
            [['started', 'ended', 'modified'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'duyuru' => 'Duyuru',
            'user_id' => 'User ID',
            'kat_id' => 'Kat ID',
            'status' => 'Status',
            'sorted' => 'Sorted',
            'started' => 'Started',
            'ended' => 'Ended',
            'modified' => 'Modified',
        ];
    }
}
