<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Data Pengelola Domain';

?>

<div class="card">
    <div class="card-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="card-body">
        <p>
            <?= Html::a('Tambah Pengelola Domain', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-bordered table-striped table-hover'],
                'headerRowOptions' => ['style' => 'white-space: nowrap;'],
                'columns' => [

                    // ID
                    [
                        'attribute' => 'pdId',
                        'label' => 'ID',
                        'value' => function ($model, $key, $index) {
                            return $index + 1;
                        }
                    ],

                    // Identitas Type (badge)
                    [
                        'attribute' => 'pdIdentitasType',
                        'label' => 'Tipe Identitas',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if (!$model->pdIdentitasType) return '-';

                            $color = [
                                'NIP'   => 'primary',
                                'NIK'   => 'success',
                                'LAIN'  => 'secondary',
                            ];

                            $badge = $color[$model->pdIdentitasType] ?? 'dark';

                            return "<span class='badge bg-{$badge}' style='font-size:12px;'>{$model->pdIdentitasType}</span>";
                        }
                    ],

                    // No Identitas
                    [
                        'attribute' => 'pdIdentitasNo',
                        'label' => 'No Identitas',
                        'value' => fn($model) => $model->pdIdentitasNo ?: '-',
                    ],

                    // Nama
                    [
                        'attribute' => 'pdNama',
                        'label' => 'Nama',
                    ],

                    // Email
                    [
                        'attribute' => 'pdEmail',
                        'label' => 'Email',
                        'format' => 'email',
                    ],

                    // Phone
                    [
                        'attribute' => 'pdPhone',
                        'label' => 'No. HP',
                        'value' => fn($model) => $model->pdPhone ?: '-',
                    ],

                    // Organisasi ID
                    [
                        'attribute' => 'pdOrgId',
                        'label' => 'Org ID',
                        'value' => fn($model) => $model->pdOrgId ?: '-',
                    ],

                    // SK Nomor
                    [
                        'attribute' => 'pdSkNomor',
                        'label' => 'No SK',
                        'value' => fn($model) => $model->pdSkNomor ?: '-',
                    ],

                    // SK Tanggal
                    [
                        'attribute' => 'pdSkTgl',
                        'label' => 'Tanggal SK',
                        'format' => ['date', 'php:Y-m-d'],
                    ],

                    // SK File (Link)
                    [
                        'attribute' => 'pdSkFile',
                        'label' => 'File SK',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if (!$model->pdSkFile) {
                                return '<span class="text-muted">Tidak ada file</span>';
                            }
                            return Html::a('Lihat File', ['/uploads/' . $model->pdSkFile], [
                                'target' => '_blank',
                                'class' => 'btn btn-sm btn-primary',
                            ]);
                        }
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