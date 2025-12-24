<?php

use yii\helpers\Url;

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Yii::$app->homeUrl; ?>" class="brand-link" style="padding: 1px;padding-left: 15px;">
        <img src="<?= Url::to(['/site/image', 'filename' => 'logo.png']); ?>"
            style="width:33px;height: 39px;margin: 7px;">
        <span class="brand-text font-weight-light"><?= Yii::$app->name; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \app\widgets\SidebarMenu::widget([
                //                'items' => \app\models\AppUserMenu::getMenus()
                'items' => [
                    ['label' => Yii::t('app', 'YII Development Tools'), 'header' => true],
                    ['label' => Yii::t('app', 'GII'), 'icon' => 'fa fa-cog', 'url' => '/gii'],
                    ['label' => Yii::t('app', 'Data Domain'), 'icon' => 'fa fa-tag', 'url' => '/data-domain/index'],
                    ['label' => Yii::t('app', 'IP Address'), 'icon' => 'fa fa-tag', 'url' => '/ip-address/index'],
                    ['label' => Yii::t('app', 'Organisasi'), 'icon' => 'fa fa-tag', 'url' => '/organisasi/index'],
                    ['label' => Yii::t('app', 'Pengelola Domain'), 'icon' => 'fa fa-tag', 'url' => '/pengelola-domain/index'],
                    ['label' => Yii::t('app', 'Tingkat Domain'), 'icon' => 'fa fa-tag', 'url' => '/tingkat-domain/index'],
                ]
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>