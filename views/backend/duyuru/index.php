<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\kouosl\duyuru\models\DuyuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Duyurus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="duyuru-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Duyuru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'image',
            'duyuru',
            'user_id',
            //'kat_id',
            //'status',
            //'sort',
            //'started',
            //'ended',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
