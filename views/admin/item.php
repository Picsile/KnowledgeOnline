<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="card my-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Заявка №<?= $model->id ?></h4>
        <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-second btn-outline-primary']) ?>
    </div>
    <div class="card-body p-0">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'user_id',
                    'visible' => (bool) Yii::$app->user->identity?->isAdmin,
                    'value' => $model->user->full_name,
                ],
                [
                    'attribute' => 'programm_id',
                    'value' => $model->programm->title,
                ],
                [
                    'label' => 'Фото диплома',
                    'format' => 'raw',
                    'value' => Html::img('/' . $model->image?->path, ['style' => 'max-width: 400px']),
                ],
                [
                    'attribute' => 'date',
                    'value' => Yii::$app->formatter->asDatetime($model->date, 'php: d.m.Y'),
                ],
                [
                    'attribute' => 'pay_type_id',
                    'value' => $model->payType->title,
                ],
                [
                    'attribute' => 'status_id',
                    'value' => $model->status->title,
                ],
                [
                    'attribute' => 'created_at',
                    'value' => Yii::$app->formatter->asDatetime($model->created_at, 'php: d.m.Y H:i:s'),
                ],
                [
                    'label' => 'Отзыв',
                    'visible' => (bool) $model->feedback,
                    'value' => $model->feedback?->comment,
                ],
            ],
        ]) ?>

        <div class="d-flex flex-wrap gap-1 mt-0 m-3">
            <?= $model->status->alias == 'New' ? Html::a('Подтверждена', ['change-status', 'id' => $model->id, 'alias' => 'Success'], ['class' => 'btn btn-accent btn-primary', 'data-method' => 'post']) : '' ?>
            <?= $model->status->alias == 'Success' ? Html::a('Идет обучение', ['change-status', 'id' => $model->id, 'alias' => 'Run'], ['class' => 'btn btn-accent btn-primary', 'data-method' => 'post']) : '' ?>
            <?= $model->status->alias == 'Run' ? Html::a('Завершена', ['change-status', 'id' => $model->id, 'alias' => 'Finish'], ['class' => 'btn btn-accent btn-primary', 'data-method' => 'post']) : '' ?>
        </div>
    </div>
</div>