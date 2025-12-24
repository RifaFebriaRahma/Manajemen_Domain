<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Data Tingkat Domain';
?>

<div class="card">
    <div class="card-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="card-body">

        <p>
            <?= Html::a('Tambah Tingkat Domain', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-bordered table-striped table-hover'],
                'headerRowOptions' => ['style' => 'white-space: nowrap;'],
                'columns' => [

                    // ID Tingkat Domain
                    [
                        'attribute' => 'tkdomId',
                        'label' => 'ID',
                        'value' => function ($model, $key, $index) {
                            return $index + 1;
                        }
                    ],

                    // Nama Tingkat Domain
                    [
                        'attribute' => 'tkdomNama',
                        'label' => 'Nama Tingkat Domain',
                        'value' => fn($model) => $model->tkdomNama ?: '-',
                    ],

                    // Tahun
                    [
                        'attribute' => 'tkdomTahun',
                        'label' => 'Tahun',
                        'value' => fn($model) => $model->tahunText,
                    ],

                    // Action Buttons
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                    ],

                ],
            ]); ?>
        </div>
    </div>
</div>