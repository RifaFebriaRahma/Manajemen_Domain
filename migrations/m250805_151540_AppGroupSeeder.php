<?php

use yii\db\Migration;

class m250805_151540_AppGroupSeeder extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%app_group}}', [
            'groupId', 'groupName', 'groupDesc', 'groupIsActive', 'groupType', 'groupCreateDate', 'groupUpdateDate', 'groupDeleteDate'
        ], [
            [1, 'Development Mode', 'Group Untuk Pengembangan Aplikasi ini, Menmbah menu, setting Group dan lain-lain.', '1', 'DEVELOPER', '2021-11-24 19:52:35', '2024-02-01 00:00:00', null],
            [7, 'Administrator', 'Mengelola Data Pengguna, Data Referensi dan Semua Transaksi', '1', 'ADMINISTRATOR', '2021-11-24 19:52:37', '2025-01-23 23:27:12', null],
            [8, 'Signer', 'Penandatangan Dokumen', '1', 'SIGNER', '2021-11-24 19:52:39', '2024-02-01 00:00:00', null],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%app_group}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250805_151540_AppGroupSeeder cannot be reverted.\n";

        return false;
    }
    */
}
