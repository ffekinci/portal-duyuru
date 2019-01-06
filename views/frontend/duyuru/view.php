<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\duyuru\models\Duyuru */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Duyurular', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="duyuru-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'duyuru:ntext',
            //'user_id',
            //'kat_id',
            //'status',
            //'sorted',
            'started',
            'ended',
            //'modified',
        ],
    ]) ?>

</div>
