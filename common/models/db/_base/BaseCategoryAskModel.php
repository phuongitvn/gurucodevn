<?php

/**
 * This is the model base class for the table "{{category_ask}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CategoryAskModel".
 *
 * Columns in table "{{category_ask}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $published
 * @property string $updated_datetime
 *
 */
abstract class BaseCategoryAskModel extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{category_ask}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'CategoryAskModel|CategoryAskModels', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, alias, updated_datetime', 'required'),
			array('published', 'numerical', 'integerOnly'=>true),
			array('name, alias', 'length', 'max'=>255),
			array('published', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, alias, published, updated_datetime', 'safe', 'on'=>'search'),
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
			'name' => Yii::t('app', 'Name'),
			'alias' => Yii::t('app', 'Alias'),
			'published' => Yii::t('app', 'Published'),
			'updated_datetime' => Yii::t('app', 'Updated Datetime'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('alias', $this->alias, true);
		$criteria->compare('published', $this->published);
		$criteria->compare('updated_datetime', $this->updated_datetime, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}