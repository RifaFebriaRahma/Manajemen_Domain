<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IpAddress */

$this->title = $model->ipAddress;
$this->params['breadcrumbs'][] = ['label' => 'IP Address', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ip-address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ipAddress], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ipAddress], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ipAddress',
            'ipNama',
            'ipServer',
            'ipCreateDate:datetime',
            'ipCreateBy',
            'ipUpdateDate:datetime',
            'ipUpdateBy',
            'ipDeleteDate:datetime',
            'ipDeleteBy',
        ],
    ]) ?>

</div>