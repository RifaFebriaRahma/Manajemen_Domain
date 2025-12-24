<?php

use yii\helpers\Html;

$this->title = 'Tambah Tingkat Domain';
$this->params['breadcrumbs'][] = ['label' => 'Data Tingkat Domain', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tingkat-domain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>