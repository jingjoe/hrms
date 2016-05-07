<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DepartmentGroup */

$this->title = 'บันทึกฝ่าย';
$this->params['breadcrumbs'][] = ['label' => 'ฝ่าย', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="department-group-create">
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
