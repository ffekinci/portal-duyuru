<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kouosl\duyuru\models\Kategori;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
use kouosl\duyuru\Module;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\duyuru\models\Duyuru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="duyuru-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'duyuru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kat_id')->dropDownList(ArrayHelper::map(Kategori::find()->all(), 'id', 'title'), ['prompt'=>'Kategori Seçiniz']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'passive' => 'Passive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sorted')->textInput() ?>

    <?= $form->field($model, 'started')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
]);?>

<?= $form->field($model, 'ended')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
]);?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('duyuru','Create'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
