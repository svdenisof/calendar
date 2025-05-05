<?php

use yii\db\Migration;

class m250416_134054_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('APP_USERS', [
            'USER_ID' => $this->primaryKey(),
            'LOGIN' => $this->string(255)->notNull()->unique(),
            'NAME' => $this->string(255)->notNull(),
            'PASSWORD' => $this->string(255)->notNull(),
            'AUTH_KEY' => $this->string(32)->notNull(),
            'STATUS' => $this->integer(1)->notNull(),
            'ROLES' => $this->integer(1)
        ]);

        $this->createIndex('Idx_APP_USERS', 'APP_USERS', 'LOGIN');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('Idx_APP_USERS', 'APP_USERS');
        $this->dropTable('APP_USERS');
    }
}
