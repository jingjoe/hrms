<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Riskgroup;
use backend\models\Type;
use backend\models\Level;
use backend\models\Program;
use backend\models\Team;

use yii\helpers\ArrayHelper;
use kartik\widgets\Select2

/* @var $this yii\web\View */
/* @var $model backend\models\Riskstore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riskstore-form">

    <?php $form = ActiveForm::begin(); ?>
         <div class="row">
        <div class="col-md-12 col-xs-12">
             <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
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
            <?= $form->field($model, 'program_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Program::find()->all(),'id','name'),
                'options' => ['placeholder' => 'กรุณาเลือกโปรแกรม'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'level_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Level::find()->all(),'id','level_name'),
                'options' => ['placeholder' => 'กรุณาเลือกระดับ'],
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
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'team_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Team::find()->all(),'id','name'),
                'options' => ['placeholder' => 'กรุณาเลือกทีม'],
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
