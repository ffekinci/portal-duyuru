<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\duyuru\models\Duyuru */

$this->title = 'Create Duyuru';
$this->params['breadcrumbs'][] = ['label' => 'Duyurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="duyuru-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
