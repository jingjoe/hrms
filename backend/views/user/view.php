<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'ชื่อผู้ใช้งาน : ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งานระบบ', 'url' => ['index']];

?>
<div class="user-view">
         <div class="panel panel-info">
            <div class="panel-body">
                <h3><?= Html::encode($this->title) ?></h3>
                <p>
                    <?= Html::a('ปรับปรุง', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a('ลบ', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ])
                    ?>
                </p>
            </div>
 <div class="panel-footer">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'user_role.role_desc',
            'user_status.status_desc',
            'created_at',
            'updated_at',
        ],
    ]) ?>
 </div>
</div>
</div>