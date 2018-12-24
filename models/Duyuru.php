<?php

namespace kouosl\duyuru\models;

use Yii;

/**
 * This is the model class for table "duyuru".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $duyuru
 * @property int $user_id
 * @property int $kat_id
 * @property int $status
 * @property int $sort
 * @property string $started
 * @property string $ended
 *
 * @property User $user
 * @property Kategori $kat
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
            [['title', 'image', 'duyuru', 'user_id', 'kat_id', 'status', 'sort', 'started', 'ended'], 'required'],
            [['user_id', 'kat_id', 'status', 'sort'], 'integer'],
            [['started', 'ended'], 'safe'],
            [['title', 'image', 'duyuru'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['kat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['kat_id' => 'id']],
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
            'image' => 'Image',
            'duyuru' => 'Duyuru',
            'user_id' => 'User ID',
            'kat_id' => 'Kat ID',
            'status' => 'Status',
            'sort' => 'Sort',
            'started' => 'Started',
            'ended' => 'Ended',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKat()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'kat_id']);
    }
}
