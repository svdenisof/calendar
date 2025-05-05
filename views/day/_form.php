<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Calendar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="calendar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PLACE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CATEGORY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'START_AT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'END_AT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REPEAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOTICE')->textInput() ?>

    <?= $form->field($model, 'ALL_DAY')->textInput() ?>

    <?= $form->field($model, 'DESCRIPTION')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>