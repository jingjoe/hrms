<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Status */

$this->title = 'เพิ่มสถานะความเสี่ยง';
$this->params['breadcrumbs'][] = ['label' => 'สถานะความเสี่ยง', 'url' => ['index']];

?>
<div class="status-create">

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
