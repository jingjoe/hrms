<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Location */

$this->title = 'ปรับปรุงสถานที่ : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'สถานที่เกิดความเสี่ยง', 'url' => ['index']];
?>
<div class="location-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
