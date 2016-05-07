<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'ปรับปรุงข้อมูล : ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งานระบบ', 'url' => ['index']];
?>
<div class="user-update">

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
