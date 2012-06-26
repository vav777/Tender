<?php

/**
 * This is the model class for table "profiles".
 *
 * The followings are the available columns in table 'profiles':
 * @property string $id
 * @property string $user_id
 * @property string $timestamp
 * @property string $privacy
 * @property string $lastname
 * @property string $firstname
 * @property integer $show_friends
 * @property integer $allow_comments
 * @property string $email
 * @property string $street
 * @property string $city
 * @property string $about
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Profiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, timestamp, privacy', 'required'),
			array('show_friends, allow_comments', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			array('privacy', 'length', 'max'=>9),
			array('lastname, firstname', 'length', 'max'=>50),
			array('email, street, city', 'length', 'max'=>255),
			array('about', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, timestamp, privacy, lastname, firstname, show_friends, allow_comments, email, street, city, about', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
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
			'timestamp' => 'Timestamp akld aksd jksad ',
			'privacy' => 'Privacy',
			'lastname' => 'Lastname',
			'firstname' => 'Firstname',
			'show_friends' => 'Show Friends',
			'allow_comments' => 'Allow Comments',
			'email' => 'Email',
			'street' => 'Street',
			'city' => 'City',
			'about' => 'About',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('privacy',$this->privacy,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('show_friends',$this->show_friends);
		$criteria->compare('allow_comments',$this->allow_comments);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('about',$this->about,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}