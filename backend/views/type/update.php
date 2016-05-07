<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Type */

$this->title = 'ปรับปรุงประเภท: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ประเภทความเสี่ยง', 'url' => ['index']];

?>
<div class="type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
