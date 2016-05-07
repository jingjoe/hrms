<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Hospital */

$this->title = $model->hos_name;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลโรงพยาบาล', 'url' => ['index']];
?>
<div class="hospital-view">
    <div class="hospital-create">
        <div class="panel panel-info">
            <div class="panel-body">
                <h3><?= Html::encode($this->title) ?></h3>
                <p>
                    <?= Html::a('ปรับปรุง', ['update', 'id' => $model->hos_id], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a('ลบ', ['delete', 'id' => $model->hos_id], [
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
                        'hos_code',
                        'hos_name',
                        'hos_address:ntext',
                        'hos_tel',
                        'hos_phone',
                        'hos_fax',
                        'hos_email:email',
                        'hos_website:url',
                        'hos_active_code:ntext',
                        ['attribute'=>'create_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->create_date,'long')],
                        ['attribute'=>'modify_date','format'=>'html','value'=>Yii::$app->thaiFormatter->asDateTime($model->modify_date,'long')],
                        'loginname',
                        'updatename'
                    ],
                ])
                ?>
            </div>
        </div>
    </div>
</div>
