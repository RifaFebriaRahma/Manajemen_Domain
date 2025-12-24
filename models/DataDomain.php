<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class DataDomain extends ActiveRecord
{
    public static function tableName()
    {
        return 'data_domain';
    }

    public function rules()
    {
        return [
            // REQUIRED
            [['domJudul', 'domTkdomId', 'domIpAddress'], 'required'],

            // SAFE (INI KUNCI UTAMA)
            [['domIpAddress'], 'safe'],

            // TIPE DATA
            [['domTkdomId', 'domMigrateTo'], 'integer'],
            [['domDeskripsi'], 'string'],
            [['domActiveDate', 'domExpireDate', 'domSuspendDate'], 'safe'],

            // STRING
            [['domNama'], 'string', 'max' => 100],
            [['domJudul'], 'string', 'max' => 255],
            [['domIpAddress'], 'string', 'max' => 100],

            // ENUM
            [['domStatus'], 'in', 'range' => ['active', 'suspend', 'remove', 'migrate']],

            // VALIDASI TINGKAT DOMAIN
            [
                ['domTkdomId'],
                'exist',
                'targetClass' => TingkatDomain::class,
                'targetAttribute' => ['domTkdomId' => 'tkdomId'],
            ],

            // VALIDASI IP ADDRESS
            [
                ['domIpAddress'],
                'exist',
                'targetClass' => IpAddress::class,
                'targetAttribute' => ['domIpAddress' => 'ipAddress'],
            ],
        ];
    }

    /* =========================
     * RELASI
     * ========================= */

    // Relasi ke Tingkat Domain
    public function getTingkatDomain()
    {
        return $this->hasOne(TingkatDomain::class, [
            'tkdomId' => 'domTkdomId'
        ]);
    }

    // Relasi ke IP Address
    public function getIpAddress()
    {
        return $this->hasOne(IpAddress::class, [
            'ipAddress' => 'domIpAddress'
        ]);
    }
    public function attributeLabels()
    {
        return [
            'domNama'        => 'Nama Domain',
            'domJudul'       => 'Judul',
            'domDeskripsi'   => 'Deskripsi',
            'domTkdomId'     => 'Tingkat Domain',
            'domIpAddress'   => 'IP Address',
            'domStatus'      => 'Status',
            'domActiveDate'  => 'Tanggal Aktif',
            'domExpireDate'  => 'Tanggal Kedaluwarsa',
            'domSuspendDate' => 'Tanggal Suspend',
            'domMigrateTo'   => 'Migrasi Ke',
        ];
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            // metadata update
            $model->domUpdateDate = date('Y-m-d H:i:s');
            $model->domUpdateBy = Yii::$app->user->identity->username ?? 'admin';

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Data domain berhasil diperbarui.');
                return $this->redirect(['index']);
            }

            Yii::error($model->errors);
            Yii::$app->session->setFlash('error', 'Data domain gagal diperbarui.');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function getTkdom()
    {
        return $this->hasOne(\app\models\TingkatDomain::class, ['tkdomId' => 'domTkdomId']);
    }
}
