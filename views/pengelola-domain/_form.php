<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengelolaDomain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengelola-domain-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'pdIdentitasType')->dropDownList([
        'NIM' => 'NIM',
        'NIP' => 'NIP',
        'NIK' => 'NIK',
    ], ['prompt' => 'Pilih Tipe Identitas']) ?>

    <?= $form->field($model, 'pdIdentitasNo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'pdNama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'pdEmail')->input('email') ?>
    <?= $form->field($model, 'pdPhone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'pdOrgId')->textInput() ?>
    <?= $form->field($model, 'pdSkNomor')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'pdSkTgl')->input('date') ?>
    <?= $form->field($model, 'pdSkFileUpload')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>