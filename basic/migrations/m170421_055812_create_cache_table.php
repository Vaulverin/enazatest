<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cache`.
 */
class m170421_055812_create_cache_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        /*
        CREATE TABLE cache (
            id char(128) NOT NULL PRIMARY KEY,
            expire int(11),
            data BLOB
        );
        */
        $this->createTable('cache', [
            'id' => $this->char(128)->notNull(),
            'expire' => $this->integer(11),
            'data' => 'BLOB'
        ]);
        $this->addPrimaryKey('pk_cache_id', 'cache', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cache');
    }
}
