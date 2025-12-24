<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TingkatDomain extends ActiveRecord
{
    public static function tableName()
    {
        return 'tingkat_domain';
    }

    // ✅ TAMBAHKAN INI
    public static function primaryKey()
    {
        return ['tkdomId']; // SESUAIKAN dengan nama PK di tabel
    }

    public function rules()
    {
        return [
            [['tkdomNama', 'tkdomTahun'], 'required'],
            [['tkdomNama'], 'string', 'max' => 100],
            [['tkdomTahun'], 'integer', 'min' => 1, 'max' => 5],
        ];
    }

    public static function mapTahun()
    {
        return [
            1 => '1995',
            2 => '1996',
            3 => '1997',
            4 => '2014',
            5 => '2015',
        ];
    }

    public function getTahunText()
    {
        $map = self::mapTahun();
        return $map[$this->tkdomTahun] ?? '-';
    }
    public function attributeLabels()
    {
        return [
            'tkdomId'         => 'ID',
            'tkdomNama'       => 'Nama Tingkat Domain',
            'tkdomTahun'      => 'Tahun',
            'tkdomCreateDate' => 'Tanggal Dibuat',
            'tkdomCreateBy'   => 'Dibuat Oleh',
            'tkdomUpdateDate' => 'Tanggal Update',
            'tkdomUpdateBy'   => 'Diupdate Oleh',
        ];
    }
}
