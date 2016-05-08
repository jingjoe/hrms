<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Riskstore */

$this->title = 'ความเสี่ยงเรื่อง : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ความเสี่ยงประจำ', 'url' => ['index']];

?>
<div class="riskstore-view">
   <p>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('<i class="glyphicon glyphicon-trash"></i> ลบ', ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            'typename',
            'programname',
            'levelname',
            'groupname',
            'teamname',
        ],
    ]) ?>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>