<?php

use yii\helpers\Html;
use kouosl\duyuru\Module;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\duyuru\models\Duyuru */

$this->title = Module::t('duyuru','Update Duyuru') . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Duyurular', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="duyuru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
