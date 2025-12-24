<?php

namespace app\controllers;

use Yii;
use app\models\DataDomain;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DataDomainController extends Controller
{
    /**
     * Proteksi HTTP Method
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Menampilkan daftar data domain (soft delete)
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DataDomain::find()->where(['domDeleteDate' => null]),
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => ['domId' => SORT_ASC],
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Create data domain
     */
    public function actionCreate()
    {
        $model = new DataDomain();

        if ($model->load(Yii::$app->request->post())) {

            // Metadata WAJIB
            $model->domCreateDate = date('Y-m-d H:i:s');
            $model->domCreateBy = Yii::$app->user->identity->username ?? 'admin';

            // Default status jika tidak dipilih
            if (empty($model->domStatus)) {
                $model->domStatus = 'active';
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Data domain berhasil disimpan.');
                return $this->redirect(['index']);
            } else {
                // DEBUG WAJIB
                Yii::error($model->errors, __METHOD__);
                Yii::$app->session->setFlash(
                    'error',
                    '<pre>' . print_r($model->errors, true) . '</pre>'
                );
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Soft delete
     */
    public function actionDelete($id)
    {
        $model = DataDomain::findOne($id);

        if ($model !== null) {
            $model->delete(); // HAPUS PERMANEN
        }

        return $this->redirect(['index']);
    }

    /**
     * Find model
     */
    protected function findModel($id)
    {
        if (($model = DataDomain::findOne([
            'domId' => $id,
            'domDeleteDate' => null
        ])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Data domain tidak ditemukan.');
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->domUpdateDate = date('Y-m-d H:i:s');
            $model->domUpdateBy = Yii::$app->user->identity->username ?? 'admin';

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
