<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IpAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ip-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ipAddress')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ipNama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ipServer')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Simpan Perubahan', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>