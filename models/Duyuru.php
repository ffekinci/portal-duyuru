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
            [['title', 'duyuru', 'kat_id', 'sorted', 'started', 'ended'], 'required'],
            [['duyuru', 'status'], 'string'],
            [['user_id', 'kat_id', 'sorted'], 'integer'],
            [['started', 'ended', 'modified'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function getKategori()
            {
                return $this->hasOne(Kategori::className(), ['id' => 'kat_id']);
            }

    public function getUser()
            {
                return $this->hasOne(User::className(), ['id' => 'user_id']);
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
