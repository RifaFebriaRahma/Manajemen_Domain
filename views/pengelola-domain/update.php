<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PengelolaDomain */

$this->title = 'Update Pengelola Domain: ' . $model->pdNama;
$this->params['breadcrumbs'][] = ['label' => 'Pengelola Domain', 'url' => ['index']];
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