<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Отзыв на заявку №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Заявка №' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оставление отзыва';
?>
<div class="application-update">

    <div class="row">
        <div class="col-lg-6">

            <div class="d-flex rounded-5 overflow-hidden w-100 shadow" style="background-color: white;">
                <div class="p-5 w-100">

                    <h3 class="mb-3"><?= Html::encode($this->title) ?></h3>

                    <?= $this->render('_form_feedback', [
                        'model' => $model,
                        'feedback' => $feedback,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>