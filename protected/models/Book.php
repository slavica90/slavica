<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property string $id
 * @property string $user_id
 * @property string $title
 * @property integer $year
 * @property string $image_url
 * @property string $rating
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Book extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
 public function beforeSave() {
    if ($this->isNewRecord) {
       $this->year=date('Y-m-d', strtotime($this->year));
               
    }
return parent::beforeSave();
  }
  
	public function tableName()
	{
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, title, year', 'required'),
			array('user_id', 'length', 'max'=>10),
			array('title', 'length', 'max'=>50),
      array('rating', 'length', 'max'=>255),
      array('image_url, year', 'safe'),
//      array('image_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, title, year', 'safe', 'on'=>'search'),
      // za prikacuvanje na slika
      array('image_url', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true),
		);
    
    
    
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
      'booksCategory' => array(self::HAS_MANY, 'CategoryBook', 'book_id'),
      'category'=>array(self::MANY_MANY, 'Category',
                'category_book(book_id, category_id)'),
      'ratings' => array(self::HAS_MANY, 'Ratings', 'book_id'),
      'review' => array(self::HAS_MANY, 'Review', 'book_id'),
      'books' => array(self::HAS_MANY, 'Book', 'user_id'),
		);
    
   
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'title' => 'Title',
			'year' => 'Year',
      'image_url' => 'Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('year',$this->year);
    $criteria->compare('image_url',$this->image_url);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
  public $prosek;
  /**
   * 
   * @param type $className
   * 
   * @return type
   */
  public function getRating($id)
	{
    $sql = "SELECT AVG(star_number) AS prosek FROM ratings   WHERE book_id=".$id; 
    $average = Yii::app()->db->createCommand($sql)->queryAll();
    return $average[0]['prosek'];
	}
  
  public function checkCoockieExists($id)
	{
     if (isset(Yii::app()->request->cookies['ratingcookie']))
    {
      $values_cookie=unserialize(Yii::app()->request->cookies['ratingcookie']); // vraka array od id-a
    }
    else
    {
      $values_cookie=array();
    }
    
    if (in_array($id,$values_cookie)){
      return true;
    }
    else
    {
      return false;
    }

	}
  
  public function getCookieArray()
	{
     if (isset(Yii::app()->request->cookies['ratingcookie']))
    {
      return $values_cookie=unserialize(Yii::app()->request->cookies['ratingcookie']); // vraka array od id-a
    }
    else
    {
     return  $values_cookie=array();
    }
    
   }
   
    public function getUserName($id)
	{
      $korisnik=User::model()->findByPk($id);
      return $korisnik->name; 
    
   }
  
  
}
