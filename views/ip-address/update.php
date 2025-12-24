<?php

use yii\helpers\Html;

$this->title = 'Edit IP Address: ' . $model->ipAddress;
$this->params['breadcrumbs'][] = ['label' => 'IP Address', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="card">
    <div class="card-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>