<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Riskstore */

$this->title = 'ปรับปรุงความเสี่ยงประจำ : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ความเสี่ยงประจำ', 'url' => ['index']];

?>
<div class="riskstore-update">
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
