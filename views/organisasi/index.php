<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Data Organisasi';
?>

<div class="card">
    <div class="card-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="card-body">
        <p>
            <?= Html::a('Tambah Organisasi', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-bordered table-striped table-hover'],
                'columns' => [

                    // ID Organisasi
                    [
                        'attribute' => 'orgId',
                        'label' => 'ID',
                        'value' => function ($model, $key, $index) {
                            return $index + 1;
                        }
                    ],

                    // Parent ID
                    [
                        'attribute' => 'orgParentId',
                        'label' => 'Induk Organisasi',
                        'value' => fn($model) => $model->orgParentId ?: '-',
                    ],

                    // Nama Organisasi
                    [
                        'attribute' => 'orgNama',
                        'label' => 'Nama Organisasi',
                        'value' => fn($model) => $model->orgNama ?: '',
                    ],

                    // Tipe Organisasi
                    [
                        'attribute' => 'orgType',
                        'label' => 'Tipe Organisasi',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if (!$model->orgType) return '';

                            // warna badge
                            $color = [
                                'REKTORAT'      => 'primary',
                                'DIREKTORAT'    => 'success',
                                'LEMBAGA'       => 'info',
                                'FAKULTAS'      => 'warning',
                                'DEPARTEMEN'    => 'secondary',
                                'UKM'           => 'dark',
                                'NON_ORG'       => 'danger',
                            ];

                            $badge = $color[$model->orgType] ?? 'secondary';

                            return "<span class='badge bg-{$badge}' style='font-size:12px;'>{$model->orgType}</span>";
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