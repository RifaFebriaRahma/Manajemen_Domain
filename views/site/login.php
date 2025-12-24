<?php

use kartik\form\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var ActiveForm $form */

/** @var app\models\LoginForm $model */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline-tabs card-success">
        <div class="card-header text-center">
            <img src="<?= Url::to(['site/image', 'filename' => 'logo.png']); ?>" style="width: 40px;height: 50px;"/>
            <b><?= Yii::$app->name; ?></b>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php
            $form = ActiveForm::begin([
                'id' => 'frm-login',
                'type' => ActiveForm::TYPE_VERTICAL
            ]);
            ?>

            <?= $form->field($model, 'username', [
                'addon' => [
                    'append' => [
                        'content' => '<span class="fas fa-user"></span>'
                    ]
                ],
            ])
                ->textInput(['placeholder' => 'Username'])
                ->label(false);
            ?>

            <?= $form->field($model, 'password', [
                'addon' => [
                    'append' => [
                        'content' => '<span class="fas fa-key"></span>'
                    ]
                ],
            ])
                ->passwordInput(['placeholder' => 'Password'])
                ->label(false);
            ?>

            <?= $form->field($model, 'captchaCode')
                ->widget(Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-4" style="text-align:center;margin-top:0px;">{image}</div><div class="col-lg-8">{input}</div></div>',
                ])
                ->label(false);
            ?>

            <div class="row pt-0 mt-0">
                <div class="col-md-12 text-right pt-0 mt-0">
                    <?= Html::submitButton('<i class="fas fa-sign-in-alt"></i> Sign In', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>


            <?php ActiveForm::end(); ?>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div style="font-size: 12px;font-style: italic;color:white;text-align:center;">
    Copyright © 2025 <a href="https://unand.ac.id" style="color:white;" target="_blank">Universitas Andalas.</a> All
    rights reserved.
</div>
