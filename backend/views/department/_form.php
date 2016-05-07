<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\DepartmentGroup;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2
/* @var $this yii\web\View */
/* @var $model backend\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'depart_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'depart_group_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(DepartmentGroup::find()->all(),'depart_group_id','depart_group_name'),
                'options' => ['placeholder' => 'กรุณาเลือกฝ่าย'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
