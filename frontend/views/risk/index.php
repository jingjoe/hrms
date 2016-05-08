<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RiskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายงานความเสี่ยง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risk-index">
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
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> รายงานความเสี่ยง</h3>',
        'type'=>'success',
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มความเสี่ยง', ['create'], ['class' => 'btn btn-success']),
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> รีเซ็ต', ['index'], ['class' => 'btn btn-default']),
        'footer'=>false
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date_report',
            'time_report',
            'period',
            //'depart_group_id',
            // 'depart_id',
            'storename',
            'more_detail:ntext',
               'locationname',
               'levelname',
               'typename',
            // 'group_id',
            // 'level_warning',
            // 'act',
            // 'problem_basic:ntext',
            // 'image:ntext',
            'loginname',
            // 'updated_by',
            // 'create_date',
            // 'modify_date',

            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'
            ], 
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
