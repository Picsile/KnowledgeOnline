<?php

use app\models\PayType;
use app\models\Programm;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($feedback, 'comment')->textInput() ?>

    <div class="form-group mt-4">
        <?= Html::submitButton('Отправить', ['class' => 'w-100 btn-accent py-2 btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>