<?php

use yii\db\Migration;

/**
 * Handles adding userId to table `blog`.
 * yii migrate/create add_userId_column_to_blog_table --fields="user_id:integer:after('sort')"
 */
class m181214_025607_add_userId_column_to_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('blog', 'user_id', $this->integer()->after('sort')->defaultValue(1)->notNull());
        $this->createIndex(
            'idx-blog-user_id',
            'blog',
            'user_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-blog-user_id',
            'blog'
        );
        $this->dropColumn('blog', 'user_id');

    }
}
