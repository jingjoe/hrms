<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Type */

$this->title = 'เพิ่มประเภทความเสี่ยง';
$this->params['breadcrumbs'][] = ['label' => 'ประเภทความเสี่ยง', 'url' => ['index']];
?>
<div class="type-create">

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
