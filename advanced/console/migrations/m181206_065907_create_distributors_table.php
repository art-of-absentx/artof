<?php

use yii\db\Migration;

/**
 * Handles the creation of table `distributors`.
 * Has foreign keys to the tables:
 * yii migrate/create create_distributors_table --fields="name:string:notNull, city_id:integer, adress:string, code:integer:notNull, isPostService:integer:foreignKey:notNull:defaultValue(0), canProcessGroup:integer:notNull:defaultValue(1)"
 * - `isPostService`
 */
class m181206_065907_create_distributors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('distributors', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'city_id' => $this->integer(),
            'address' => $this->string(),
            'code' => $this->integer()->notNull(),
            'isPostService' => $this->integer(1)->notNull()->defaultValue(0),
            'canProcessGroup' => $this->integer(1)->notNull()->defaultValue(1),
        ]);

//        // creates index for column `isPostService`
//        $this->createIndex(
//            'idx-distributors-isPostService',
//            'distributors',
//            'isPostService'
//        );
//
//        // add foreign key for table `isPostService`
//        $this->addForeignKey(
//            'fk-distributors-isPostService',
//            'distributors',
//            'isPostService',
//            'isPostService',
//            'id',
//            'CASCADE'
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        // drops foreign key for table `isPostService`
//        $this->dropForeignKey(
//            'fk-distributors-isPostService',
//            'distributors'
//        );
//
//        // drops index for column `isPostService`
//        $this->dropIndex(
//            'idx-distributors-isPostService',
//            'distributors'
//        );

        $this->dropTable('distributors');
    }
}
