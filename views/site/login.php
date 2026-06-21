<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="row">
        <div class="col-lg-8">

            <div class="d-flex rounded-5 overflow-hidden w-100 shadow" style="background-color: white;">
                <div class="position-relative overflow-hidden" style="width: 500px;">
                    <img src="/img/login.jpg" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="">
                </div>
                <div class="p-5 w-100">

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                            'inputOptions' => ['class' => 'col-lg-3 form-control'],
                            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                        ],
                    ]); ?>

                    <h3 class="mb-3"><?= Html::encode($this->title) ?></h3>

                    <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ]) ?>

                    <div class="form-group">
                        <div>
                            <?= Html::submitButton('Войти', ['class' => 'w-100 btn-accent py-2 btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <div>
                        <span>Ещё нет аккаунта?</span>
                        <?= Html::a('Зарегистрироваться', 'register') ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <div style="color:#999;">
                        Вы можете использовать <strong>admin/Root$123</strong> or <strong>а/а</strong>.<br>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>