<?php

use yii\helpers\Html;
use kouosl\duyuru\Module;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\duyuru\models\Duyuru */

$this->title = Module::t('duyuru','Create Duyuru');
$this->params['breadcrumbs'][] = ['label' => Module::t('duyuru','Announcements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="duyuru-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
