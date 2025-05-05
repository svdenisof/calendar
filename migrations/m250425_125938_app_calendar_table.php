<?php

use yii\db\Migration;

class m250425_125938_app_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("APP_CALENDAR", [
            'ID'            => $this->primaryKey(),
            'NAME'          => $this->string(255)->notNull(),
            'PLACE'         => $this->string(255)->null(),
            'CATEGORY'      => $this->string(255)->null(),
            'START_AT'      => $this->string(255)->notNull(),
            'END_AT'        => $this->string(255)->notNull(),
            'REPEAT'        => $this->string(255)->null(),
            'NOTICE'        => $this->boolean(),
            'ALL_DAY'       => $this->boolean(),
            'DESCRIPTION'   => $this->text()
        ]);

        $this->createIndex('Idx_APP_CALENDAR', 'APP_CALENDAR', 'ID');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('Idx_APP_CALENDAR', 'APP_USERS');
        $this->dropTable('APP_CALENDAR');
    }


}
