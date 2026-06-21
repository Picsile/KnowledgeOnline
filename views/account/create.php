<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Создание заявки';
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create">

    <div class="row">
        <div class="col-lg-6">
            <div class="d-flex rounded-5 overflow-hidden w-100 shadow" style="background-color: white;">

                <div class="p-5 w-100">

                    <h3 class="mb-3"><?= Html::encode($this->title) ?></h3>

                    <?= $this->render('_form', [
                        'model' => $model,
                        'uploadForm' => $uploadForm,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>