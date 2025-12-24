<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataDomain */

$this->title = $model->domNama;
$this->params['breadcrumbs'][] = ['label' => 'Data Domain', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-domain-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->domId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->domId], [
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
            'domNama',
            'domJudul',
            'domDeskripsi:ntext',
            [
                'attribute' => 'domTkdomId',
                'value' => function ($model) {
                    return $model->tkdom->tkdomNama ?? '-';
                },
            ],
            [
                'attribute' => 'domIpAddress',
                'value' => function ($model) {
                    return $model->domIpAddress ?? '-';
                },
            ],
            'domStatus',
            'domActiveDate:date',
            'domExpireDate:date',
            'domSuspendDate:date',
            'domMigrateTo',
            'domCreateDate:datetime',
            'domCreateBy',
            'domUpdateDate:datetime',
            'domUpdateBy',
        ],
    ]) ?>

</div>