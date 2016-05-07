<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ระดับความรุนแรง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-index">
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ระดับความรุนแรง</h3>',
        'type'=>'success',
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มระดับความรุนแรง', ['create'], ['class' => 'btn btn-success']),
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset', ['index'], ['class' => 'btn btn-default']),
        'footer'=>false
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'level_id',
            'level_name',
            'typename',
            'groupname',
            'level_warning',
            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
