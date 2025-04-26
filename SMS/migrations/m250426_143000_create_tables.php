<?php

use yii\db\Migration;

/**
 * Class m250425_create_tables
 */
class m250426_143000_create_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('department', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->createTable('student', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'department_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-student-department_id',
            'student',
            'department_id',
            'department',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-student-department_id', 'student');
        $this->dropTable('student');
        $this->dropTable('department');
    }
}