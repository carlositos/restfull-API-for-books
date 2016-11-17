<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property integer $author_id
 * @property integer $genre_id
 * @property string $name
 * @property string $summary
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'genre_id'], 'integer'],
            [['summary'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'genre_id' => 'Genre ID',
            'name' => 'Name',
            'summary' => 'Summary',
        ];
    }
	
	public function extraFields()
	{
		return ['author', 'genre'];
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAuthor()
	{
		return $this->hasOne(Author::className(), ['id' => 'author_id']);
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGenre()
	{
		return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
	}
}
