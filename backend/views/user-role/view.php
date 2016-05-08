<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserRole */

$this->title = 'ชื่อสิทธิ : ' . $model->role_name;
$this->params['breadcrumbs'][] = ['label' => 'สิทธิใช้งาน', 'url' => ['index']];

?>
<div class="user-role-view">

  <p>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> แก้ไข', ['update', 'id' => $model->role_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('<i class="glyphicon glyphicon-trash"></i> ลบ', ['delete', 'id' => $model->role_id], [
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
            'role_id',
            'role_name',
        ],
    ]) ?>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>