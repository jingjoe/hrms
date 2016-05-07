<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Team */

$this->title = 'ปรับปรุงทีม : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ทีมนำโรงพยาบาล', 'url' => ['index']];
?>
<div class="team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
