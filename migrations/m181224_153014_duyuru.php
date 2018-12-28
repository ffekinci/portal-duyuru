<?php

use yii\db\Migration;

/**
 * Class m181224_153014_duyuru
 */
class m181224_153014_duyuru extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $TABLE_NAME = 'duyuru';
        $this->createTable($TABLE_NAME, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
			'duyuru' => $this->text()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'kat_id' => $this->integer()->notNull(),
            'status' => "ENUM('active', 'passive')",
			'sorted' => $this->integer()->notNull(),
            'started' => $this->dateTime()->notNull(),
			'ended' => $this->dateTime()->notNull(),
            'modified' => $this->dateTime()->notNull()
        ], $tableOptions);
		
		$TABLE_NAME = 'kategori';
        $this->createTable($TABLE_NAME, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $TABLE_NAME = 'duyuru';
        $this->dropTable($TABLE_NAME);
		
		$TABLE_NAME = 'kategori';
        $this->dropTable($TABLE_NAME);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181224_153014_duyuru cannot be reverted.\n";

        return false;
    }
    */
}
