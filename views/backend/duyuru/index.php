<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kouosl\duyuru\Module;

/* @var $this yii\web\View */
/* @var $searchModel vendor\kouosl\duyuru\models\DuyuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('duyuru','Announcements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="duyuru-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('duyuru','Create Duyuru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'duyuru:ntext',
            [
                'attribute' => 'user_id',
                'value' => 'user.username',
            ],
            [
                'attribute' => 'kat_id',
                'value' => 'kategori.title',
            ],
            'status',
            'sorted',
            'started',
            'ended',
            //'modified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
