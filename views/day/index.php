<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Calendar $model */
/** @var yii\web\Request $month */
/** @var yii\web\Request $day */

$this->title = 'Создать событие';
$this->params['breadcrumbs'][] = ['label' => 'Days'];
$this->params['breadcrumbs'][] = $this->title; /** TDOD добавить дату события в пилюльке */
?>
<div class="calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>