<?php

use app\models\Application;
use yii\bootstrap5\LinkPager;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мои заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <div class="d-flex justify-content-between align-items-center">
        <h3><?= Html::encode($this->title) ?></h3>
        <?= Html::a('Создание заявки', ['create'], ['class' => 'btn-accent btn btn-success']) ?>
    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'pager' => ['class' => LinkPager::class],
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'item',
    ]) ?>

</div>