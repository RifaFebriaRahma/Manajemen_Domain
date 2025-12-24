<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
\app\assets\AppAssetAdminLte::register($this);

/* @var $this \yii\web\View */
/* @var $content string */

if (Yii::$app->user->isGuest) {
    echo $this->render('mainLogin',['content' => $content]);
} else {
    $this->beginPage();
    ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" data-geolocscriptallow="true" style="height: auto;">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon"
              href="<?= Yii::getAlias('@web/images/logo.png'); ?>"/>
        <?= Html::csrfMetaTags(); ?>
        <title><?php echo Yii::$app->name; ?></title>
        <?= $this->head(); ?>
    </head>
    <body class="hold-transition sidebar-mini fixed layout-navbar-fixed layout-fixed layout-footer-fixed" style="height: auto">
    <?= $this->beginBody(); ?>
    <div class="wrapper">
        <?= $this->render('_mainHeader.php', []); ?>
        <?= $this->render('_mainLeft') ?>
        <?= $this->render('_mainContent.php', ['content' => $content]); ?>
        <?= $this->render('_mainFooter.php', []); ?>
    </div>
    <?= $this->endBody(); ?>
    </body>
    </html>
    <?php
    $this->endPage();
}