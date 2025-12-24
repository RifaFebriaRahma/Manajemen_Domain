<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Organisasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organisasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orgParentId')->textInput() ?>
    <?= $form->field($model, 'orgNama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'orgType')->dropDownList([
        'REKTORAT'    => 'REKTORAT',
        'DIREKTORAT'  => 'DIREKTORAT',
        'LEMBAGA'     => 'LEMBAGA',
        'FAKULTAS'    => 'FAKULTAS',
        'DEPARTEMEN'  => 'DEPARTEMEN',
        'UKM'         => 'UKM',
        'NON_ORG'     => 'NON_ORG',
    ], ['prompt' => 'Pilih Tipe Organisasi']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>