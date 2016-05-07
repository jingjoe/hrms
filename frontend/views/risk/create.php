<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Risk */

$this->title = 'Create Risk';
$this->params['breadcrumbs'][] = ['label' => 'Risks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
