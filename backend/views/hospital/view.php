<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Hospital */

$this->title =''. ' '.'HCODE : ' . ' ' . $model->hos_code. ' '.'ชื่อ : ' . ' ' . $model->hos_name ;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลโรงพยาบาล', 'url' => ['index']];
?>
<div class="hospital-view">
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไข', ['update', 'id' => $model->hos_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('<i class="glyphicon glyphicon-trash"></i> ลบ', ['delete', 'id' => $model->hos_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณแน่ใจหรือว่าต้องการลบรายการนี้หรือไม่ ?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>


    <div class="panel panel-success">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'hos_code',
                        'hos_name',
                        'hos_address:ntext',
                        'hos_tel',
                        'hos_phone',
                        'hos_fax',
                        'hos_email:email',
                        'hos_website:url',
                        'hos_active_code:ntext',
                        'create_date',
                        'modify_date',
                        'loginname',
                        'updatename'
                    ],
                ])
                ?>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>