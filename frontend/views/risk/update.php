<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Risk */

$this->title = 'แก้ไขความเสี่ยงเรื่อง : ' . $model->storename;
$this->params['breadcrumbs'][] = ['label' => 'รายงานความเสี่ยง', 'url' => ['index']];

?>
<div class="risk-update">

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
