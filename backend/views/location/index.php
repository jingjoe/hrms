<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สถานที่เกิดความเสี่ยง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-index">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="pull-right">
                <form class="form-inline">
                    <div class="form-group">
                        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php Pjax::begin(); ?>    
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'panel' => [
        'type' => GridView::TYPE_SUCCESS,
        'type' => 'success',
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มสถานที่', ['create'], ['class' => 'btn btn-success']),
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
        //'id',
        'name',
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}<span class="glyphicon glyphicon-option-vertical"></span>{update}<span class="glyphicon glyphicon-option-vertical"></span>{delete}'
        ],
    ],
]);
?>
<?php Pjax::end(); ?>
</div>

<?= \bluezed\scrollTop\ScrollTop::widget() ?>