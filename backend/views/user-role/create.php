<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserRole */

$this->title = 'เพิ่มสิทธิใช้งาน'  ;
$this->params['breadcrumbs'][] = ['label' => 'สิทธิใช้งาน', 'url' => ['index']];
?>
<div class="user-role-create">

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
