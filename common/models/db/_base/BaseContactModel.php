<?php

/**
 * This is the model base class for the table "{{contact}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ContactModel".
 *
 * Columns in table "{{contact}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $subject
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $content
 * @property string $created_datetime
 * @property integer $status
 *
 */
abstract class BaseContactModel extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{contact}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ContactModel|ContactModels', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, email, mobile, content', 'required'),
			array('id, status', 'numerical', 'integerOnly'=>true),
			array('subject, name, email', 'length', 'max'=>255),
			array('email', 'email'),
			array('mobile', 'length', 'max'=>100),
			array('created_datetime', 'safe'),
			array('subject, created_datetime, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, subject, name, email, mobile, content, created_datetime, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'subject' => Yii::t('app', 'Subject'),
			'name' => Yii::t('app', 'Name'),
			'email' => Yii::t('app', 'Email'),
			'mobile' => Yii::t('app', 'Mobile'),
			'content' => Yii::t('app', 'Content'),
			'created_datetime' => Yii::t('app', 'Created Datetime'),
			'status' => Yii::t('app', 'Status'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('subject', $this->subject, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('mobile', $this->mobile, true);
		$criteria->compare('content', $this->content, true);
		$criteria->compare('created_datetime', $this->created_datetime, true);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}