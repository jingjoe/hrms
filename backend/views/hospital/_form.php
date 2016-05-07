<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Hospital;

/* @var $this yii\web\View */
/* @var $model backend\models\Hospital */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospital-form">

    <?php $form = ActiveForm::begin(); ?>
       <div class="row">
            <div class="col-md-2 col-xs-12">
                  <?= $form->field($model, 'hos_code')->textInput(['maxlength' => true]) ?> 
            </div>
            <div class="col-md-10 col-xs-12">
                    <?= $form->field($model, 'hos_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12 col-xs-12">
                  <?= $form->field($model, 'hos_address')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-2 col-xs-2">
                 <?= $form->field($model, 'hos_tel')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '999-999999',]) ?>
            </div>
            <div class="col-md-2 col-xs-2">
              <?= $form->field($model, 'hos_phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '999-9999999',]) ?>
            </div>
            <div class="col-md-2 col-xs-4">
             <?= $form->field($model, 'hos_fax')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '999-999999',]) ?>
            </div>
            <div class="col-md-6 col-xs-4">
                 <?= $form->field($model, 'hos_email')->widget(\yii\widgets\MaskedInput::className(),[
            'name' => 'input-36',
            'clientOptions' => [
                'alias' =>  'email',
            ],
            ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-xs-6">
                <?= $form->field($model, 'hos_website')->widget(\yii\widgets\MaskedInput::className(),[
                    'name' => 'input-35',
                    'clientOptions' => [
                        'alias' =>  'url',
                    ],
                ]) ?>

            </div>
            <div class="col-md-4 col-xs-6">
                <?= $form->field($model, 'hos_active_code')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
