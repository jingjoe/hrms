<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Level */

$this->title = 'เพิ่มระดับความรุนแรง';
$this->params['breadcrumbs'][] = ['label' => 'ระดับความรุนแรง', 'url' => ['index']];
?>
<div class="level-create">
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
