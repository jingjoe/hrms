<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Program */

$this->title = 'ปรับปรุงโปรแกรมความเสี่ยง : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'โปรแกรมความเสี่ยง', 'url' => ['index']];
?>
<div class="program-update">
      <div class="panel panel-info">
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
