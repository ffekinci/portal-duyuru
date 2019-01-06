<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kouosl\duyuru\Module;

/* @var $this yii\web\View */
/* @var $searchModel vendor\kouosl\duyuru\models\KategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('duyuru','Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('duyuru','Create Categori'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
