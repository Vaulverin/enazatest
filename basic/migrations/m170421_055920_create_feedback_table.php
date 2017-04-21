<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feedback`.
 */
class m170421_055920_create_feedback_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'theme_id' => $this->integer(),
            'body' => $this->text()
        ]);
        $this->addForeignKey('fk_feedback_theme_id', 'feedback', 'theme_id', 'theme', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('feedback');
    }
}
