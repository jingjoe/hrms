<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RiskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="risk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_report') ?>

    <?= $form->field($model, 'time_report') ?>

    <?= $form->field($model, 'period') ?>

    <?= $form->field($model, 'depart_group_id') ?>

    <?php // echo $form->field($model, 'depart_id') ?>

    <?php // echo $form->field($model, 'riskstore_id') ?>

    <?php // echo $form->field($model, 'more_detail') ?>

    <?php // echo $form->field($model, 'location_id') ?>

    <?php // echo $form->field($model, 'risklevel_id') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'group_id') ?>

    <?php // echo $form->field($model, 'level_warning') ?>

    <?php // echo $form->field($model, 'act') ?>

    <?php // echo $form->field($model, 'problem_basic') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'modify_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
