<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $activationKey
 * @property integer $createtime
 * @property integer $lastvisit
 * @property integer $lastaction
 * @property integer $lastpasswordchange
 * @property integer $superuser
 * @property integer $status
 * @property string $avatar
 * @property string $notifyType
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('createtime, lastvisit, lastaction, lastpasswordchange, superuser, status', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('password, activationKey', 'length', 'max'=>128),
			array('avatar', 'length', 'max'=>255),
			array('notifyType', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, activationKey, createtime, lastvisit, lastaction, lastpasswordchange, superuser, status, avatar, notifyType', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'activationKey' => 'Activation Key',
			'createtime' => 'Createtime',
			'lastvisit' => 'Lastvisit',
			'lastaction' => 'Lastaction',
			'lastpasswordchange' => 'Lastpasswordchange',
			'superuser' => 'Superuser',
			'status' => 'Status',
			'avatar' => 'Avatar',
			'notifyType' => 'Notify Type',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('activationKey',$this->activationKey,true);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('lastvisit',$this->lastvisit);
		$criteria->compare('lastaction',$this->lastaction);
		$criteria->compare('lastpasswordchange',$this->lastpasswordchange);
		$criteria->compare('superuser',$this->superuser);
		$criteria->compare('status',$this->status);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('notifyType',$this->notifyType,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}