<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'ติดต่อผู้ดูแลระบบ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="site-contact">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    <p>หากท่านมีข้อสงสัยหรือคำถามที่เกี่ยกับระบบนี้หรืองานอื่น ๆ โปรดกรอกแบบฟอร์มต่อไปนี้เพื่อติดต่อเรา กรุณาให้ข้อมูลที่เป็นจริง ขอบคุณ.</p>
                </div>
                <div class="panel-body">
                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name') ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'subject') ?>

                        <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                        <?=
                        $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
                        ])
                        ?>

                        <div class="form-group pull-right">
                            <?= Html::submitButton('ส่ง', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>

