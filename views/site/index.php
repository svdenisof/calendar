<?php

/** @var yii\web\View $this */
/** @var app\models\Month $month */

$this->title = 'My Yii Application';
if(Yii::$app->user->isGuest){

    print $this->render("nouser/index");
 }
else
{
    print $this->render("user/index", [
        'user' => Yii::$app->user->identity,
        'month' => $month
    ]);
}
?>