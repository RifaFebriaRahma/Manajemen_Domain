<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class IpAddress extends ActiveRecord
{
    public static function tableName()
    {
        return 'ip_address';  // sesuaikan dengan nama tabel kamu
    }

    public function rules()
    {
        return [
            [['ipAddress', 'ipNama', 'ipServer', 'ipCreateDate', 'ipCreateBy'], 'required'],
            [['ipCreateDate', 'ipUpdateDate', 'ipDeleteDate'], 'safe'],
            [['ipAddress', 'ipNama', 'ipServer', 'ipCreateBy', 'ipUpdateBy', 'ipDeleteBy'], 'string', 'max' => 100],
        ];
    }
    public function attributeLabels()
    {
        return [
            'ipAddress'     => 'IP Address',
            'ipNama'        => 'Nama Layanan',
            'ipServer'      => 'Jenis Server',
            'ipCreateDate'  => 'Tanggal Dibuat',
            'ipCreateBy'    => 'Dibuat Oleh',
            'ipUpdateDate'  => 'Tanggal Diubah',
            'ipUpdateBy'    => 'Diubah Oleh',
            'ipDeleteDate'  => 'Tanggal Dihapus',
            'ipDeleteBy'    => 'Dihapus Oleh',
        ];
    }
}
