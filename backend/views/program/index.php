<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'โปรแกรมความเสี่ยง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-index">
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
            'type' => 'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มโปรแกรมความเสี่ยง', ['create'], ['class' => 'btn btn-success']),
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
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'typename',
            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>