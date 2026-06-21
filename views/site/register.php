<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <div class="row">
        <div class="col-lg-8">

            <div class="d-flex rounded-5 overflow-hidden w-100 shadow" style="background-color: white;">
                <div class="position-relative overflow-hidden" style="width: 500px;">
                    <img src="/img/register.jpg" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="">
                </div>
                <div class="p-5 w-100">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <h3 class="mb-3"><?= Html::encode($this->title) ?></h3>

                    <?= $form->field($model, 'full_name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'login') ?>

                    <?= $form->field($model, 'password') ?>

                    <?= $form->field($model, 'repeat_password') ?>

                    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
                        'mask' => '+7(999)-999-99-99',
                    ]) ?>

                    <?= $form->field($model, 'email') ?>

                    <div class="form-group mt-4">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'w-100 py-2 btn-accent btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                    <div>
                        <span>Уже есть аккаунт?</span>
                        <?= Html::a('Войти', 'login') ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>