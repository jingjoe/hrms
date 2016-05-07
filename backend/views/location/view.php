<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Location */

$this->title = 'สถานที่ : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'สถานที่เกิดความเสี่ยง', 'url' => ['index']];
?>
<div class="location-view">
    <div class="panel panel-info">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
            <p>
                <?= Html::a('ปรับปรุง', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?=
                Html::a('ลบ', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
            </p>
        </div>
        <div class="panel-footer">

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                ],
            ])
            ?>
        </div>
    </div>
</div>