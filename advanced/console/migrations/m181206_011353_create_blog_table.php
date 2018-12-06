<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blog`.
 * Has foreign keys to the tables:
 *
 * - `status`
 * - `sort`
 * yii migrate/create create_blog_table --fields="title:string:notNull, text:text, url:string:notNull, status_id:integer:foreignKey:notNull:defaultValue(1), sort:integer:foreignKey:notNull:defaultValue(50)"
 */
class m181206_011353_create_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('blog', [
            'id' => $this->primaryKey(),
            'title' => $this->string(150)->notNull(),
            'text' => $this->text(),
            'url' => $this->string(150)->notNull(),
            'status_id' => $this->integer(1)->notNull()->defaultValue(1),
            'sort' => $this->integer(2)->notNull()->defaultValue(50),
        ]);

        // creates index for column `status_id`
        $this->createIndex(
            'idx-blog-status_id',
            'blog',
            'status_id'
        );

        // add foreign key for table `status`
//        $this->addForeignKey(
//            'fk-blog-status_id',
//            'blog',
//            'status_id',
//            'status',
//            'id',
//            'CASCADE'
//        );

        // creates index for column `sort`
        $this->createIndex(
            'idx-blog-sort',
            'blog',
            'sort'
        );

        // add foreign key for table `sort`
//        $this->addForeignKey(
//            'fk-blog-sort',
//            'blog',
//            'sort',
//            'sort',
//            'id',
//            'CASCADE'
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `status`
//        $this->dropForeignKey(
//            'fk-blog-status_id',
//            'blog'
//        );

        // drops index for column `status_id`
        $this->dropIndex(
            'idx-blog-status_id',
            'blog'
        );

        // drops foreign key for table `sort`
//        $this->dropForeignKey(
//            'fk-blog-sort',
//            'blog'
//        );

        // drops index for column `sort`
        $this->dropIndex(
            'idx-blog-sort',
            'blog'
        );

        $this->dropTable('blog');
    }
}
