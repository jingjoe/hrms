<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DepartmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-search">
    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>
    <?= $form->field($model, 'depart_name')->textInput(array('placeholder' => 'ระบุชื่อแผนก')); ?>
    <div class="form-group">
    <?= Html::submitButton('ค้นหา', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
