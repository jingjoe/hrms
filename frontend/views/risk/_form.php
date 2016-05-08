<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
// ลิงค์โมดูล dropdownlist
use backend\models\Department;
use backend\models\DepartmentGroup;
use backend\models\Level;
use backend\models\Location;
use backend\models\Program;
use backend\models\Riskgroup;
use backend\models\Riskstore;
use backend\models\Status;
use backend\models\Team;
use backend\models\Type;

/* @var $this yii\web\View */
/* @var $model frontend\models\Risk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="risk-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?> 
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <?php
            echo '<label class="control-label">วันที่รายงาน</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'date_report',
                'language' => 'th',
                'options' => ['placeholder' => 'ปี-เดือน-วัน'],
                'layout' => '{picker}{input}',
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                ]
            ]);
            ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?php
            echo '<label class="control-label">เวลาที่รายงาน</label>';
            echo TimePicker::widget([
                'model' => $model,
                'attribute' => 'time_report',
                'pluginOptions' => [
                    'showSeconds' => true,
                    'showMeridian' => false,
                    'minuteStep' => 1,
                    'secondStep' => 5,
                ],
                'options' => [
                    'class' => 'form-control',
                ],
            ]);
            ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'period')->dropDownList([ 'เวรเช้า' => 'เวรเช้า', 'เวรบ่าย' => 'เวรบ่าย', 'เวรดึก' => 'เวรดึก',], ['prompt' => '-เลือกเวรทำการ-']) ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?=
            $form->field($model, 'depart_group_id')->dropdownList(
                    ArrayHelper::map(DepartmentGroup::find()->all(), 'depart_group_id', 'depart_group_name'), [
                'id' => 'ddl-departgroup',
                'prompt' => 'เลือกฝ่าย'
                    ]
            );
            ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?=
            $form->field($model, 'depart_id')->widget(DepDrop::classname(), [
                'options' => ['id' => 'ddl-depart'],
                'data' => [],
                //'data' => $dep,
                'type' => DepDrop::TYPE_SELECT2,
                'pluginOptions' => [
                    'depends' => ['ddl-departgroup'],
                    'placeholder' => 'เลือกแผนก',
                    'url' => Url::to(['/risk/get-depart'])
                ]
            ]);
            ?>
        </div>
    </div>
    <!-- end row1 --> 

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?=
            $form->field($model, 'riskstore_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Riskstore::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'กรุณาเลือกความเสี่ยง'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
<!-- end row2 --> 

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'more_detail')->textarea(['rows' => 6]) ?>
        </div>
    </div>

<!-- end row3 --> 
    <div class="row">
        <div class="col-md-4 col-xs-12">
         <?=
         $form->field($model, 'location_id')->widget(Select2::classname(), [
             'data' => ArrayHelper::map(Location::find()->all(), 'id', 'name'),
             'options' => ['placeholder' => 'กรุณาเลือกสถานที่'],
             'pluginOptions' => [
                 'allowClear' => true
             ],
         ]);
         ?>
        </div>
        <div class="col-md-8 col-xs-12">
         <?=
         $form->field($model, 'risklevel_id')->widget(Select2::classname(), [
             'data' => ArrayHelper::map(Level::find()->all(), 'id', 'level_name'),
             'options' => ['placeholder' => 'กรุณาเลือกระดับ'],
             'pluginOptions' => [
                 'allowClear' => true
             ],
         ]);
         ?>
        </div>
    </div>
<!-- end row4 --> 

   <div class="row">
        <div class="col-md-4 col-xs-12">
            <?=
            $form->field($model, 'type_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Type::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'กรุณาเลือกประเภท'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <?=
            $form->field($model, 'group_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Riskgroup::find()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'กรุณาเลือกกลุ่มความเสี่ยง'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-3 col-xs-12">

            <?=
            $form->field($model, 'level_warning')->widget(Select2::classname(), [
             'data' => ArrayHelper::map(Level::find()->all(), 'level_warning', 'level_warning'),
             'options' => ['placeholder' => 'กรุณาเลือกระดับ'],
             'pluginOptions' => [
                 'allowClear' => true
             ],
            ]);
            ?>
        </div>
        <div class="col-md-2 col-xs-12">
            <?= $form->field($model, 'act')->dropDownList([ 'เชิงรุก' => 'เชิงรุก', 'เชิงรับ' => 'เชิงรับ',], ['prompt' => '-เลือกเชิงรับ/เชิงรุก-']) ?>
        </div>
    </div>
<!-- end row5 --> 

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'problem_basic')->textarea(['rows' => 6]) ?>
        </div>
    </div>
<!-- end row6 --> 
 
    <?= $form->field($model, 'image[]')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'initialPreview' => empty($model->image) ? [] : [
                Yii::getAlias('@web') . '/riskimage/' . $model->image,
                    ],
            'allowedFileExtensions' => ['gif', 'jpg', 'png'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false
        ]
    ]);
    ?>
<!-- end row7 --> 

    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-save"></i> ' . ($model->isNewRecord ? 'บันทึก' : 'แก้ไข'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-warning') . ' btn-lg btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>