<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Data IP Address';
?>

<div class="card">
    <div class="card-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="card-body">

        <p>
            <?= Html::a('Tambah IP Address', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-bordered table-striped table-hover'],
                'columns' => [

                    // IP Address
                    [
                        'attribute' => 'ipAddress',
                        'label' => 'IP Address',

                    ],

                    // Nama
                    [
                        'attribute' => 'ipNama',
                        'label' => 'Nama',
                        'value' => fn($model) => $model->ipNama ?: '',
                    ],

                    // Server
                    [
                        'attribute' => 'ipServer',
                        'label' => 'Server',
                        'value' => fn($model) => $model->ipServer ?: '',
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