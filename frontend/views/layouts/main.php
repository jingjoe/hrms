<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
<!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />-->
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                //'brandLabel' => 'HRMS',
                'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $username = '';
            if (!Yii::$app->user->isGuest) {
                $username = '(' . Html::encode(Yii::$app->user->identity->username) . ')';
            }
            if (Yii::$app->user->isGuest) {
                $submenuItems[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']];
                $submenuItems[] = ['label' => 'ลงทะเบียนผู้ใช้งาน', 'url' => ['/site/signup']];
            } else {
                if (Yii::$app->user->identity->role == 1) {
                    $submenuItems[] = [
                        'label' => 'จัดการระบบ',
                        'url' => Yii::$app->urlManagerBackend->createUrl(['site/index']),
                        'linkOptions' => ['target' => '_blank']
                    ];
                }
                $submenuItems[] = [
                    'label' => 'ออกจากระบบ',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

            $risk_mnu_itms[] = ['label' => 'รายงานความเสี่ยง', 'url' => ['risk/index']];

            $help_mnu_itms[] =  ['label' => 'ความรู้เรื่องความเสี่ยง','url' => ['help/books']];
            $help_mnu_itms[] =['label' => 'ดาวน์โหลดแบบฟอร์ม','url' => ['help/fromload']];
            $help_mnu_itms[] =['label' => 'คู่มือการใช้งาน','url' => ['help/manual']];
            if (!Yii::$app->user->isGuest) {
                $risk_mnu_itms[] = ['label' => 'ลงทะเบียนความเสี่ยง', 'url' => ['risk/register']];
                $risk_mnu_itms[] = ['label' => 'ทบทวนความเสี่ยง', 'url' => ['risk/review']];
            }

            $menuItems = [

                ['label' => 'หน้าหลัก', 'url' => ['/site/index']],
                ['label' => 'พบความเสี่ยง', 'items' => $risk_mnu_itms],
                ['label' => 'รายงาน', 'url' => ['/risk/report']],
                ['label' => 'ช่วยเหลือ', 'items' => $help_mnu_itms],
                ['label' => 'ผู้ใช้งาน' . $username, 'items' => $submenuItems],
            ];


            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
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
