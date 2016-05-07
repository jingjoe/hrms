<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\UserRole;
use backend\models\UserStatus;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map(UserRole::find()->all(), 'role_id', 'role_desc')); ?>

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map(UserStatus::find()->all(), 'status_id', 'status_name')); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
