<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Organisasi extends ActiveRecord
{
    public static function tableName()
    {
        return 'organisasi'; // sesuaikan jika nama tabel berbeda
    }

    public function rules()
    {
        return [
            [['orgNama', 'orgType'], 'required'],
            [['orgParentId'], 'integer'],
            [['orgNama'], 'string', 'max' => 100],
            [['orgType'], 'string', 'max' => 50],
        ];
    }
    public function attributeLabels()
    {
        return [
            'orgParentId' => 'Induk Organisasi',
            'orgNama'     => 'Nama Organisasi',
            'orgType'     => 'Tipe Organisasi',
        ];
    }
    public function getParent()
    {
        return $this->hasOne(Organisasi::class, ['orgId' => 'orgParentId']);
    }
}
