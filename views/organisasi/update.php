<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Organisasi */

$this->title = 'Update Organisasi: ' . $model->orgNama;
$this->params['breadcrumbs'][] = ['label' => 'Organisasi', 'url' => ['index']];
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