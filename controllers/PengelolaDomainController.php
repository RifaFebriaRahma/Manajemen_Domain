<?php

namespace app\controllers;

use Yii;
use app\models\PengelolaDomain;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class PengelolaDomainController extends Controller
{
    // Index
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PengelolaDomain::find(),
            'pagination' => ['pageSize' => 20],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    // Create
    public function actionCreate()
    {
        $model = new PengelolaDomain();
        $model->pdCreateDate = date('Y-m-d H:i:s');
        $model->pdCreateBy = Yii::$app->user->identity->username ?? 'admin';

        if ($model->load(Yii::$app->request->post())) {
            $model->pdSkFileUpload = UploadedFile::getInstance($model, 'pdSkFileUpload');
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    // Update
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->pdSkFileUpload = UploadedFile::getInstance($model, 'pdSkFileUpload');
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['model' => $model]);
    }

    // Delete
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
        if (($model = \app\models\PengelolaDomain::findOne($id)) !== null) {
            return $model;
        }

        throw new \yii\web\NotFoundHttpException('Pengelola Domain tidak ditemukan.');
    }
}
