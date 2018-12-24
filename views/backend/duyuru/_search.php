<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\duyuru\models\DuyuruSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="duyuru-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'duyuru') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'kat_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'started') ?>

    <?php // echo $form->field($model, 'ended') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
