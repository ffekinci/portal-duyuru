<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\kouosl\duyuru\models\DuyuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Duyurular';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="duyuru-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
             [
        'attribute' => 'image',
        'format' => 'html',    
        'value' => function ($data) {
            return Html::img(Yii::getAlias('@web').'/images/'. $data['image'],
                ['width' => '70px']);
        },
    ],
            'duyuru',
            //'user_id',
            //'kat_id',
            //'status',
            //'sort',
            //'started',
            //'ended',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
