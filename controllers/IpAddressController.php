<?php

namespace app\controllers;

use Yii;
use app\models\IpAddress;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class IpAddressController extends Controller
{
    // Halaman index menampilkan GridView
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => IpAddress::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    // Halaman create menampilkan _form.php
    public function actionCreate()
    {
        $model = new IpAddress();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // redirect ke index setelah sukses simpan
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    // Halaman update (optional)
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Data IP Address berhasil diperbarui.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    // Hapus data (optional)
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = IpAddress::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('IP Address tidak ditemukan.');
    }
}
