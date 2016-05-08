<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Riskgroup */

$this->title = 'เพิ่มกลุ่มความเสี่ยง';
$this->params['breadcrumbs'][] = ['label' => 'กลุ่มความเสี่ยง', 'url' => ['index']];

?>
<div class="riskgroup-create">
    <div class="bg-success">
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
