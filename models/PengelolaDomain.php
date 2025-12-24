<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class PengelolaDomain extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $pdSkFileUpload; // untuk file upload sementara

    public static function tableName()
    {
        return 'pengelola_domain';
    }

    public function rules()
    {
        return [
            [['pdIdentitasType', 'pdIdentitasNo', 'pdNama', 'pdEmail', 'pdPhone', 'pdOrgId', 'pdSkNomor', 'pdSkTgl', 'pdCreateBy'], 'required'],
            [['pdOrgId'], 'integer'],
            [['pdSkTgl', 'pdCreateDate', 'pdUpdateDate', 'pdDeleteDate'], 'safe'],
            [['pdIdentitasNo', 'pdSkNomor'], 'string', 'max' => 50],
            [['pdNama'], 'string', 'max' => 150],
            [['pdEmail'], 'string', 'max' => 100],
            [['pdPhone', 'pdCreateBy', 'pdUpdateBy', 'pdDeleteBy'], 'string', 'max' => 100],
            [['pdIdentitasType'], 'in', 'range' => ['NIM', 'NIP', 'NIK']],
            [['pdSkFileUpload'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf,jpg,jpeg,png', 'maxSize' => 5 * 1024 * 1024],
        ];
    }

    public function attributeLabels()
    {
        return [
            'pdIdentitasType' => 'Tipe Identitas',
            'pdIdentitasNo'   => 'Nomor Identitas',
            'pdNama'          => 'Nama Pengelola',
            'pdEmail'         => 'Email',
            'pdPhone'         => 'Nomor Telepon',
            'pdOrgId'         => 'Organisasi',
            'pdSkNomor'       => 'Nomor SK',
            'pdSkTgl'         => 'Tanggal SK',
            'pdFileSk'        => 'File SK',
        ];
    }

    /**
     * Sebelum save, simpan file jika ada
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->pdSkFileUpload instanceof UploadedFile) {
                $fileName = time() . '_' . preg_replace('/\s+/', '_', $this->pdSkFileUpload->baseName) . '.' . $this->pdSkFileUpload->extension;
                $uploadPath = Yii::getAlias('@webroot/uploads/') . $fileName;
                if (!is_dir(Yii::getAlias('@webroot/uploads/'))) mkdir(Yii::getAlias('@webroot/uploads/'), 0777, true);
                $this->pdSkFileUpload->saveAs($uploadPath);
                $this->pdSkFile = $fileName;
            }
            return true;
        }
        return false;
    }
    public function getOrg()
    {
        return $this->hasOne(\app\models\Organisasi::class, ['orgId' => 'pdOrgId']);
    }
}
