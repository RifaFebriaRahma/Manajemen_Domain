<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PengelolaDomain */

$this->title = $model->pdNama;
$this->params['breadcrumbs'][] = ['label' => 'Pengelola Domain', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengelola-domain-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pdId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pdId], [
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
            'pdIdentitasType',
            'pdIdentitasNo',
            'pdNama',
            'pdEmail:email',
            'pdPhone',
            [
                'attribute' => 'pdOrgId',
                'value' => function ($model) {
                    return $model->org ? $model->org->orgNama : '-';
                },
            ],
            'pdSkNomor',
            'pdSkTgl:date',
            [
                'label' => 'File SK',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->pdSkFile ? Html::a('Download', ['download', 'id' => $model->pdId], ['target' => '_blank']) : '-';
                }
            ],
            'pdCreateDate:datetime',
            'pdCreateBy',
            'pdUpdateDate:datetime',
            'pdUpdateBy',
        ],
    ]) ?>

</div>