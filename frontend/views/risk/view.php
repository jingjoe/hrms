<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Risk */

$this->title =''. ' '.'ชื่อความเสี่ยง : ' . ' ' . $model->storename. ' '.'สถานที่เกิดเหตุ : ' . ' ' . $model->locationname. ' '.'ระดับ : ' . ' ' . $model->levelname ;
$this->params['breadcrumbs'][] = ['label' => 'รายงานความเสี่ยง', 'url' => ['index']];

?>
<div class="risk-view">

     <p>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i> ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณแน่ใจหรือว่าต้องการลบรายการนี้หรือไม่ ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    
    <div class="panel panel-success">
        <div class="panel-body">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'date_report',
            'time_report',
            'period',
            'departgroupname',
            'departname',
            'storename',
            'more_detail:ntext',
            'locationname',
            //'levelname',
            'level.level_name',
            'typename',
            'groupname',
            'level_warning',
            'act',
            'problem_basic:ntext',
            //'image:ntext',
            [
            'format'=>'raw',
            'attribute'=>'image',
            'value'=>$model->getPhotosViewer()
            ],
            'loginname',
            'updatename',
            'create_date',
            'modify_date',     
        ],
    ]) ?>

    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>