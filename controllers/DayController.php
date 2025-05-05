<?php

namespace app\controllers;

use app\models\Calendar;
use yii\web\Controller;

class DayController extends Controller
{
    public function actionIndex(int $month, int $day)
    {
        $model = new Calendar();
        $model->loadDefaultValues();
        return $this->render('index', [
            'model' => $model,
            'month' => $month,
            'day'   => $day
        ]);
    }

}
