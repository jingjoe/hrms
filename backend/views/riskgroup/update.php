<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Riskgroup */

$this->title = 'ปรับปรุงกลุ่มความเสี่ยง : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'กลุ่มความเสี่ยง', 'url' => ['index']];

?>
<div class="riskgroup-update">
    <div class="bg-warning">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-footer">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
