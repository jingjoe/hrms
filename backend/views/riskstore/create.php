<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Riskstore */

$this->title = 'เพิ่มความเสี่ยงประจำ';
$this->params['breadcrumbs'][] = ['label' => 'ความเสี่ยงประจำ', 'url' => ['index']];

?>
<div class="riskstore-create">
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
