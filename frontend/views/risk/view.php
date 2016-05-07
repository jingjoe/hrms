<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Risk */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Risks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date_report',
            'time_report',
            'period',
            'depart_group_id',
            'depart_id',
            'riskstore_id',
            'more_detail:ntext',
            'location_id',
            'risklevel_id',
            'type_id',
            'group_id',
            'level_warning',
            'act',
            'problem_basic:ntext',
            'image:ntext',
            'created_by',
            'updated_by',
            'create_date',
            'modify_date',
        ],
    ]) ?>

</div>
