<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สิทธิใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-role-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
            'type' => 'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มสิทธิใช้งาน', ['create'], ['class' => 'btn btn-success']),
        ],
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'beforeGrid' => '',
            'afterGrid' => '',
        ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'role_id',
            'role_name',

            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'
            ],
        ],
    ]); ?>
</div>
  <?= \bluezed\scrollTop\ScrollTop::widget() ?>