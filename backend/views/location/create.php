<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Location */

$this->title = 'เพิ่มสถานที่';
$this->params['breadcrumbs'][] = ['label' => 'สถานที่เกิดความเสี่ยง', 'url' => ['index']];

?>
<div class="location-create">

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
