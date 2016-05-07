<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Status */

$this->title = 'ปรับปรุงสถานะความเสี่ยง : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'สถานะความเสี่ยง', 'url' => ['index']];

?>
<div class="status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
