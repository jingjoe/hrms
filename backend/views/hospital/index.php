<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\Hospital;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลโรงพยาบาล';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospital-index">
    
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'type' => 'success',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> บันทึกข้อมูล รพ.', ['create'], ['class' => 'btn btn-success']),
        ],
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=> true,
            'beforeGrid'=>'',
            'afterGrid'=>'',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'hos_code',
            'hos_name',
            'hos_address',
            'hos_tel',
            'create_date',
            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'
            ],   
            ],
    ]); ?>
</div>

