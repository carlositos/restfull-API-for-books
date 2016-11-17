<?php

use yii\db\Migration;

class m161117_151921_init extends Migration
{
    public function up()
    {
	    $this->createTable('author', [
		    'id' => $this->primaryKey(),
		    'full_name' => $this->string(),
		    'biography' => $this->text(),
	    ]);
	
	    $this->createTable('genre', [
		    'id' => $this->primaryKey(),
		    'name' => $this->string(),
	    ]);
	
	    $this->createTable('book', [
		    'id' => $this->primaryKey(),
		    'author_id' => $this->integer()->notNull(),
		    'genre_id' => $this->integer()->notNull(),
		    'name' => $this->string(),
		    'summary' => $this->text(),
	    ]);
	
	    // creates index for column `author_id`
	    $this->createIndex(
		    'idx-book-author_id',
		    'book',
		    'author_id'
	    );
	
	    // creates index for column `genre_id`
	    $this->createIndex(
		    'idx-book-genre_id',
		    'book',
		    'genre_id'
	    );
    }

    public function down()
    {
	    $this->dropIndex(
		    'idx-book-author_id',
		    'book'
	    );
	    
	    $this->dropIndex(
		    'idx-book-genre_id',
		    'book'
	    );
    	
	    $this->dropTable('author');
	    $this->dropTable('genre');
	    $this->dropTable('book');
    }
}
