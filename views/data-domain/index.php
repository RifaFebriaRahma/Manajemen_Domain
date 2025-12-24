<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Data Domain';
?>

<div class="card">
    <div class="card-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="card-body">
        <p>
            <?= Html::a('Tambah Data Domain', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-bordered table-striped table-hover'],
                'columns' => [

                    [
                        'attribute' => 'domId',   // tetap terhubung ke database
                        'label' => 'ID',
                        'value' => function ($model, $key, $index) {
                            return $index + 1;   // tetap nomor urut
                        },
                    ],


                    [
                        'attribute' => 'domNama',
                        'label' => 'Nama',
                    ],

                    [
                        'attribute' => 'domJudul',
                        'label' => 'Judul',
                    ],

                    [
                        'attribute' => 'domDeskripsi',
                        'label' => 'Deskripsi',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if (!$model->domDeskripsi) return '';
                            return strlen($model->domDeskripsi) > 50
                                ? substr($model->domDeskripsi, 0, 50) . '...'
                                : $model->domDeskripsi;
                        }
                    ],

                    [
                        'attribute' => 'domTkdomId',
                        'label' => 'Tingkat Domain',
                    ],

                    [
                        'attribute' => 'domIpAddress',
                        'label' => 'IP Address',
                    ],

                    [
                        'attribute' => 'domStatus',
                        'label' => 'Status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $color = [
                                'active'   => 'success',
                                'suspend'  => 'warning',
                                'remove'   => 'danger',
                                'migrate'  => 'primary',
                            ];
                            $badgeColor = $color[$model->domStatus] ?? 'secondary';
                            return "<span class='badge bg-{$badgeColor}'>{$model->domStatus}</span>";
                        }
                    ],

                    [
                        'attribute' => 'domActiveDate',
                        'label' => 'Active Date',
                        'format' => ['date', 'php:Y-m-d'],
                    ],
                    [
                        'attribute' => 'domExpireDate',
                        'label' => 'Expire Date',
                        'format' => ['date', 'php:Y-m-d'],
                    ],
                    [
                        'attribute' => 'domSuspendDate',
                        'label' => 'Suspend Date',
                        'format' => ['date', 'php:Y-m-d'],
                    ],

                    [
                        'attribute' => 'domMigrateTo',
                        'label' => 'Migrasi To',
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>