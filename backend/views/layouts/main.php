<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'จัดการระบบ HRMS',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'หน้าหลัก', 'url' => ['site/index']],
        ['label' => 'ตั้งค่าระบบ', 'items' => [
            ['label' => 'ข้อมูลโรงพยาบาล','url' => ['hospital/index']],
            ['label' => 'จัดการผู้ใช้งาน','url' => ['user/index']],
            ['label' => 'เพิ่มฝ่ายและแผนก','url' => ['department/index']],
            ['label' => 'ทีมนำโรงพยาบาล','url' => ['team/index']],
            ['label' => 'สถานที่เกิดความเสี่ยง','url' => ['location/index']],
            ['label' => 'ประเภทความเสี่ยง','url' => ['type/index']],
            ['label' => 'กลุ่มความเสี่ยง','url' => ['riskgroup/index']],
            ['label' => 'ระดับความรุนแรง','url' => ['level/index']],           
            ['label' => 'โปรแกรมความเสี่ยง','url' => ['program/index']],
            ['label' => 'ความเสี่ยงประจำ',  'url' => ['riskstore/index']],
            ['label' => 'สถานะความเสี่ยง', 'url' => ['status/index']],
        ]],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'ออกจากระบบ (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

   <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Hospital Risk Management System <?= date('Y') ?></p>
                <p class="pull-right">Developed By <?= Html::a('wichian nunsri', ['site/about']) ?></p>
            </div>
        </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
