<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TingkatDomain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tingkat-domain-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tkdomNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tkdomTahun')->dropDownList(
        \app\models\TingkatDomain::mapTahun(),
        ['prompt' => 'Pilih Tahun']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>