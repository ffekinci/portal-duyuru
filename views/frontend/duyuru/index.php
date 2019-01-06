<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kouosl\duyuru\models\Duyuru;
use yii\data\ActiveDataProvider;
use kouosl\duyuru\Module;

/* @var $this yii\web\View */
/* @var $searchModel vendor\kouosl\duyuru\models\DuyuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('duyuru','Announcements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="duyuru-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $dat = date('Y-m-d h:m:s');
    $dataProvider = new ActiveDataProvider([
        'query' => Duyuru::find()->where("started <= '$dat' AND ended >= '$dat'"),
        'pagination'=>['pageSize'=>10],
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'duyuru:ntext',
            [
                'attribute' => 'kat_id',
                'value' => 'kategori.title',
            ],
             [
                 'attribute' => 'user_id',
                 'value' => 'user.username',
             ],
            //'status',
            //'sorted',
            'started',
            'ended',
            //'modified',

            ['class' => 'yii\grid\ActionColumnView'],
        ],
    ]) ?>
</div>
