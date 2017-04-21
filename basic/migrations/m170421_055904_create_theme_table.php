<?php

use yii\db\Migration;

/**
 * Handles the creation of table `themes`.
 */
class m170421_055904_create_theme_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('theme', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
        foreach (['Well done!', 'Good', 'Could be better ...', 'Awfully!!!'] as $name) {
            $this->insert('theme', ['name' => $name]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('theme');
    }
}
