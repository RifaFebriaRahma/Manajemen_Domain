<?php

use yii\db\Migration;

class m250804_052908_create_app_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
// Table: app_group
        $this->createTable('{{%app_group}}', [
            'groupId' => $this->primaryKey(),
            'groupName' => $this->string(100)->notNull(),
            'groupDesc' => $this->text(),
            "groupIsActive" => "ENUM('0','1') NOT NULL DEFAULT '1'",
            "groupType" => "ENUM('DEVELOPER','SIGNER','ADMINISTRATOR') NOT NULL",
            'groupCreateDate' => $this->dateTime()->notNull(),
            'groupUpdateDate' => $this->dateTime(),
            'groupDeleteDate' => $this->dateTime(),
        ]);

        // Table: app_menu
        $this->createTable('{{%app_menu}}', [
            'menuId' => $this->primaryKey(),
            'menuParentId' => $this->integer()->defaultValue(0),
            'menuLabel' => $this->string(100)->notNull(),
            'menuUrl' => $this->string(150),
            'menuController' => $this->string(100),
            "menuIsActive" => "ENUM('1','0') NOT NULL",
            "menuIsSubAction" => "ENUM('1','0') NOT NULL DEFAULT '0'",
            "menuIsHeader" => "ENUM('0','1') NOT NULL DEFAULT '0'",
            'menuOrder' => $this->integer()->notNull(),
            'menuIcon' => $this->string(100),
        ]);

        // Table: app_action
        $this->createTable('{{%app_action}}', [
            'actionId' => $this->primaryKey(),
            'actionMenuId' => $this->integer()->notNull(),
            'actionName' => $this->string(100)->notNull(),
            'actionDesc' => $this->string(255),
        ]);

        $this->addForeignKey('fk_app_action_menu', '{{%app_action}}', 'actionMenuId', '{{%app_menu}}', 'menuId', 'CASCADE', 'CASCADE');

        // Table: app_group_menu
        $this->createTable('{{%app_group_menu}}', [
            'gmMenuId' => $this->integer()->notNull(),
            'gmGroupId' => $this->integer()->notNull(),
            'gmActionName' => $this->string(100)->notNull(),
        ]);
        $this->addPrimaryKey('pk_app_group_menu', '{{%app_group_menu}}', ['gmMenuId', 'gmGroupId', 'gmActionName']);
        $this->addForeignKey('fk_group_menu_menu', '{{%app_group_menu}}', 'gmMenuId', '{{%app_menu}}', 'menuId', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_group_menu_group', '{{%app_group_menu}}', 'gmGroupId', '{{%app_group}}', 'groupId', 'CASCADE', 'CASCADE');

        // Table: app_group_view
        $this->createTable('{{%app_group_view}}', [
            'gvGroupId' => $this->integer()->notNull(),
            'gvGroupIdView' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('pk_app_group_view', '{{%app_group_view}}', ['gvGroupId', 'gvGroupIdView']);
        $this->addForeignKey('fk_group_view_group', '{{%app_group_view}}', 'gvGroupId', '{{%app_group}}', 'groupId', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_group_view_group_view', '{{%app_group_view}}', 'gvGroupIdView', '{{%app_group}}', 'groupId', 'CASCADE', 'CASCADE');

        // Table: app_logs
        $this->createTable('{{%app_logs}}', [
            'logId' => $this->primaryKey(),
            'logAppId' => $this->string(30)->notNull(),
            'logBankCode' => $this->string(5),
            'logController' => $this->string(25)->notNull(),
            'logAction' => $this->string(25)->notNull(),
            'logIpAddress' => $this->string(20)->notNull(),
            'logRequestId' => $this->string(50),
            'logRequestData' => $this->text(),
            'logResponseData' => $this->text(),
            'logResponseCode' => $this->integer(),
            'logResponseDate' => $this->dateTime(),
            'logResponseTime' => $this->integer(),
            'logRequestDate' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);
        $this->createIndex('idx_log_request_unique', '{{%app_logs}}', ['logAction', 'logRequestId'], true);

        // Table: app_session
        $this->createTable('{{%app_session}}', [
            'id' => $this->char(40)->notNull(),
            'expire' => $this->integer(),
            'data' => $this->binary(),
            'createDate' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
        $this->addPrimaryKey('pk_app_session', '{{%app_session}}', 'id');

        // Table: app_user
        $this->createTable('{{%app_user}}', [
            'userId' => $this->primaryKey(),
            'userFirstName' => $this->string(150)->notNull(),
            'userLastName' => $this->string(150),
            'userEmail' => $this->string(150)->notNull()->unique(),
            'userPhone' => $this->string(100)->notNull(),
            'userUnitId' => $this->integer()->notNull(),
            'userWhatsApp' => $this->string(50),
            "userIsSso" => "ENUM('0','1') NOT NULL",
            'userUidSso' => $this->string(100),
            'userPassword' => $this->string(255)->notNull(),
            'userGroupId' => $this->integer()->notNull(),
            "userIsActive" => "ENUM('1','0') NOT NULL DEFAULT '1'",
            'userActivationCode' => $this->string(150),
            "userIsConfirmed" => "ENUM('0','1') NOT NULL DEFAULT '0'",
            'userExpire' => $this->date(),
            'userLastLogin' => $this->dateTime(),
            'userIpLogin' => $this->string(30),
            'userLoginBlocked' => $this->date(),
            'userAksesToken' => $this->string(250),
            'userCreateDate' => $this->dateTime()->notNull(),
            'userUpdateDate' => $this->dateTime(),
            'userDeleteDate' => $this->dateTime(),
        ]);
        $this->addForeignKey('fk_user_group', '{{%app_user}}', 'userGroupId', '{{%app_group}}', 'groupId', 'NO ACTION', 'CASCADE');

        // Table: ref_unit
        $this->createTable('{{%ref_unit}}', [
            'unitId' => $this->primaryKey(),
            'unitNama' => $this->string(150),
            'unitCreateDate' => $this->dateTime()->notNull(),
            'unitUpdateDate' => $this->dateTime(),
            'unitDeleteDate' => $this->dateTime(),
        ]);

        // Table: app_user_data
        $this->createTable('{{%app_user_data}}', [
            'udUserId' => $this->integer()->notNull(),
            'udUnitId' => $this->integer()->notNull(),
            "udIsDefault" => "ENUM('0','1') NOT NULL DEFAULT '0'",
        ]);
        $this->addPrimaryKey('pk_app_user_data', '{{%app_user_data}}', ['udUserId', 'udUnitId']);
        $this->addForeignKey('fk_user_data_user', '{{%app_user_data}}', 'udUserId', '{{%app_user}}', 'userId', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_user_data_unit', '{{%app_user_data}}', 'udUnitId', 'ref_unit', 'unitId', 'CASCADE', 'CASCADE'); // NOTE: ref_unit harus ada
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%app_user_data}}');
        $this->dropTable('{{%app_user}}');
        $this->dropTable('{{%app_session}}');
        $this->dropTable('{{%app_logs}}');
        $this->dropTable('{{%app_group_view}}');
        $this->dropTable('{{%app_group_menu}}');
        $this->dropTable('{{%app_action}}');
        $this->dropTable('{{%app_menu}}');
        $this->dropTable('{{%app_group}}');
        $this->dropTable('{{%ref_unit}}');
    }

}
