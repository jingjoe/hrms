<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Risk */

$this->title = 'Update Risk: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Risks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="risk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
