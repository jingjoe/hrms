<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DepartmentGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'depart_group_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
