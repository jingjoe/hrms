<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RiskstoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ความเสี่ยงประจำ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riskstore-index">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="pull-right">
                    <div class="form-inline">
                        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                    </div>
            </div>
        </div>
    </div>
<?php Pjax::begin(); ?>    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ความเสี่ยงประจำ</h3>',
        'type'=>'success',
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มความเสี่ยงประจำ', ['create'], ['class' => 'btn btn-success']),
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset', ['index'], ['class' => 'btn btn-default']),
        'footer'=>false
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'typename',
            'programname',
            'levelname',
            'groupname',
            'teamname',
            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'
            ],   
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
