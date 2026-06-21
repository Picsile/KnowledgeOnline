<?php

use app\models\PayType;
use app\models\Programm;
use app\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ApplicationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <div class="d-flex flex-wrap gap-1">
        <div class="d-flex flex-wrap gap-1">
            <?= $form->field($model, 'programm_id', ['options' => ['class' => ['m-0']]])->label(false)->dropDownList(Programm::getProgramms(), ['prompt' => 'Курс или вибинар']) ?>
            <?= $form->field($model, 'pay_type_id', ['options' => ['class' => ['m-0']]])->label(false)->dropDownList(PayType::getPayTypes(), ['prompt' => 'Способ оплаты']) ?>
            <?= $form->field($model, 'status_id', ['options' => ['class' => ['m-0']]])->label(false)->dropDownList(Status::getStatuses(), ['prompt' => 'Статус']) ?>
        </div>
        <div class="d-flex flex-wrap gap-1">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-second btn-primary']) ?>
            <?= Html::a('Сброс', 'index', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>