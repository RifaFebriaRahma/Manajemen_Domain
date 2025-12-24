<?php

use yii\helpers\Html;

$this->title = 'Tambah Data Domain';
$this->params['breadcrumbs'][] = ['label' => 'Data Domain', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="data-domain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>