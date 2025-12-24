<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TingkatDomain;
use app\models\IpAddress;

/* =========================
 * DATA DROPDOWN
 * ========================= */

$tingkatDomain = TingkatDomain::find()->all();

$ipAddress = IpAddress::find()
    ->where(['ipDeleteDate' => null])
    ->all();

?>

<div class="data-domain-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'domNama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domJudul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domDeskripsi')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'domTkdomId')->dropDownList(
        ArrayHelper::map($tingkatDomain, 'tkdomId', 'tkdomNama'),
        ['prompt' => '-- Pilih Tingkat Domain --']
    ) ?>

    <?= $form->field($model, 'domIpAddress')->dropDownList(
        ArrayHelper::map($ipAddress, 'ipAddress', 'ipAddress'),
        ['prompt' => '-- Pilih IP Address --']
    ) ?>

    <?= $form->field($model, 'domStatus')->dropDownList([
        'active'  => 'Active',
        'suspend' => 'Suspend',
        'remove'  => 'Remove',
        'migrate' => 'Migrate',
    ], ['prompt' => '-- Pilih Status --']) ?>

    <?= $form->field($model, 'domActiveDate')->input('date') ?>
    <?= $form->field($model, 'domExpireDate')->input('date') ?>
    <?= $form->field($model, 'domSuspendDate')->input('date') ?>
    <?= $form->field($model, 'domMigrateTo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>