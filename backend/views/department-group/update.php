<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DepartmentGroup */

$this->title = 'ปรับปรุงฝ่าย: ' . ' ' . $model->depart_group_name;
$this->params['breadcrumbs'][] = ['label' => 'ฝ่าย', 'url' => ['index']];

?>

<div class="department-group-update">
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