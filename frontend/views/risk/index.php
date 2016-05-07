<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RiskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Risks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Risk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_report',
            'time_report',
            'period',
            'depart_group_id',
            // 'depart_id',
            // 'riskstore_id',
            // 'more_detail:ntext',
            // 'location_id',
            // 'risklevel_id',
            // 'type_id',
            // 'group_id',
            // 'level_warning',
            // 'act',
            // 'problem_basic:ntext',
            // 'image:ntext',
            // 'created_by',
            // 'updated_by',
            // 'create_date',
            // 'modify_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
