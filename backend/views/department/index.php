<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ฝ่ายและแผนก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> บันทึกฝ่าย', ['department-group/index'], ['class' => 'btn btn-danger', 'title' => 'บันทึกฝ่าย',]) ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="pull-right">
                <form class="form-inline">
                    <div class="form-group">
                        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                </form>
                    </div>
            </div>
        </div>
    </div>
 <?php Pjax::begin();?>  
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'type' => 'success', 
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> บันทึกแผนก', ['create'], ['class' => 'btn btn-success']),
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

            'depart_name',
            [
            'attribute' => 'departgroup',
            'value' => 'departgroup.depart_group_name'
            ],
            'create_date',
            'loginname',
            ['class' => 'yii\grid\ActionColumn', 
                'template' => '{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'],   
            ],

    ]); ?>
 <?php Pjax::end();?>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>
