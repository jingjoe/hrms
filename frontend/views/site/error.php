<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="jumbotron">
      <h1><?=Html::img('@web/images/error.png')?><?= Html::encode($this->title) ?></h1>
      <p class="text-danger"><?= nl2br(Html::encode($message)." ".'กรุณาติดต่อผู้ดูแลระบบ !') ?></p>
      <p><?= Html::a('ติดต่อ SystemAdmin', ['/site/contact'], ['class' => 'btn btn-default btn-lg']) ?></p>
</div>
