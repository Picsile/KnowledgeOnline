<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Заявка №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <div class="d-flex align-items-center gap-3 mb-3">
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-accent btn-primary']) ?>
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

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

    <div class="d-flex flex-wrap gap-1">
        <?= $model->status->alias == 'Finish' && !$model->feedback ? Html::a('Оставить отзыв', ['feedback', 'id' => $model->id], ['class' => 'btn btn-accent btn-primary']) : '' ?>
    </div>

</div>