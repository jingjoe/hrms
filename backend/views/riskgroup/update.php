<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Riskgroup */

$this->title = 'ปรับปรุงกลุ่มความเสี่ยง : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'กลุ่มความเสี่ยง', 'url' => ['index']];

?>
<div class="riskgroup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
