<?php

use yii\helpers\Html;

$this->title = 'Tambah IP Address';
$this->params['breadcrumbs'][] = ['label' => 'Data IP Address', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ip-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>