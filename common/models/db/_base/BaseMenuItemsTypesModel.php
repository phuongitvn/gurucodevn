<?php

/**
 * This is the model base class for the table "{{menu_items_types}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "MenuItemsTypesModel".
 *
 * Columns in table "{{menu_items_types}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name
 * @property string $view
 * @property string $rule
 * @property integer $ordering
 * @property string $params
 *
 */
abstract class BaseMenuItemsTypesModel extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{menu_items_types}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'MenuItemsTypesModel|MenuItemsTypesModels', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('ordering', 'numerical', 'integerOnly'=>true),
			array('name, view, rule, params', 'length', 'max'=>255),
			array('name, view, rule, ordering, params', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, view, rule, ordering, params', 'safe', 'on'=>'search'),
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
			'view' => Yii::t('app', 'View'),
			'rule' => Yii::t('app', 'Rule'),
			'ordering' => Yii::t('app', 'Ordering'),
			'params' => Yii::t('app', 'Params'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('view', $this->view, true);
		$criteria->compare('rule', $this->rule, true);
		$criteria->compare('ordering', $this->ordering);
		$criteria->compare('params', $this->params, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}