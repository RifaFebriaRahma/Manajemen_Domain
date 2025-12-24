<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\AppAsset;
use app\widgets\Alert;

AppAsset::register($this);
\app\assets\AppAssetAdminLte::register($this);

/* @var $this \yii\web\View */
/* @var $content string */


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
    <body class="login-page h-75 bg-body">
    <?= $this->beginBody(); ?>
    <?= Alert::widget(); ?>
<!--    <section class="content">-->
<!--        <div class="container-fluid">-->
            <?= $content; ?>
<!--        </div>-->
<!--    </section>-->
    <?= $this->endBody(); ?>
    </body>
    </html>
<?php
$this->endPage();