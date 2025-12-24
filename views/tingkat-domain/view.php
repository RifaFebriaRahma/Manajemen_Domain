<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TingkatDomain */

$this->title = $model->tkdomNama;
$this->params['breadcrumbs'][] = ['label' => 'Data Tingkat Domain', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tingkat-domain-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tkdomId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tkdomId], [
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
            'tkdomNama',
            'tkdomCreateDate:datetime',
            'tkdomCreateBy',
            'tkdomUpdateDate:datetime',
            'tkdomUpdateBy',
        ],
    ]) ?>

</div>