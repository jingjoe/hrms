<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Riskgroup;
use backend\models\Type;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2

/* @var $this yii\web\View */
/* @var $model backend\models\Level */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="level-form">

    <?php $form = ActiveForm::begin(); ?>
    
      <div class="row">
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'level_id')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-10 col-xs-12">
            <?= $form->field($model, 'level_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'type_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Type::find()->all(),'id','name'),
                'options' => ['placeholder' => 'กรุณาเลือกประเภทความเสี่ยง'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'group_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Riskgroup::find()->all(),'id','name'),
                'options' => ['placeholder' => 'กรุณาเลือกกลุ่มความเสี่ยง'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'level_warning')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-save"></i> ' . ($model->isNewRecord ? 'บันทึก' : 'แก้ไข'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-warning') . ' btn-lg btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>