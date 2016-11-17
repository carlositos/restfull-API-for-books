<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property integer $id
 * @property string $full_name
 * @property string $biography
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['biography'], 'string'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'biography' => 'Biography',
        ];
    }
	
	public function extraFields()
	{
		return ['books'];
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getBooks()
	{
		return $this->hasMany(Book::className(), ['author_id' => 'id']);
	}
}
