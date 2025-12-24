<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>
<!-- Navbar -->
<!--<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">-->
<nav class="main-header navbar navbar-expand navbar-green">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= Url::to(['/site/index']) ?>" class="nav-link">Home</a>
        </li>
<!--        <li class="nav-item d-none d-sm-inline-block">-->
<!--            <a href="--><?php // Url::to(['/site/contact']) ?><!--" class="nav-link">Contact</a>-->
<!--        </li>-->
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i> <?= Yii::$app->user->identity->displayName ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">Akun Saya</span>
                <div class="dropdown-divider"></div>
                <a href="<?= Url::to(['/site/profil-pengguna']) ?>" class="dropdown-item">
                    <i class="far fa-user mr-2"></i> Profil Saya
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= Url::to(['/site/ganti-password']) ?>" class="dropdown-item">
                    <i class="fas fa-key mr-2"></i> Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <!--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
                <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    '<i class="fas fa-sign-out-alt"></i> <b>Logout</b>',
                    ['class' => 'btn btn-link logout dropdown-item dropdown-footer','data-confirm'=>'Anda yakin logout?']
                )
                . Html::endForm(); ?>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
