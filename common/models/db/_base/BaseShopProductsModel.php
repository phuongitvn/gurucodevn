<?php

/**
 * This is the model base class for the table "shop_products".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ShopProductsModel".
 *
 * Columns in table "shop_products" available as properties of the model,
 * followed by relations of table "shop_products" available as properties of the model.
 *
 * @property integer $product_id
 * @property string $sku
 * @property integer $category_id
 * @property integer $tax_id
 * @property integer $manufactor_id
 * @property string $title
 * @property string $description
 * @property string $description_full
 * @property string $description_more
 * @property string $price
 * @property string $old_price
 * @property string $image
 * @property string $image2
 * @property string $image3
 * @property string $image4
 * @property string $language
 * @property string $specifications
 * @property integer $featured
 * @property integer $view
 * @property integer $published
 * @property string $updated_datetime
 *
 * @property ShopImage[] $shopImages
 * @property ShopCategory $category
 */
abstract class BaseShopProductsModel extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'shop_products';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ShopProductsModel|ShopProductsModels', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('category_id, tax_id, title', 'required'),
			array('category_id, tax_id, manufactor_id, featured, view, published', 'numerical', 'integerOnly'=>true),
			array('sku, old_price, image, image2, image3, image4', 'length', 'max'=>255),
			array('title, price, language', 'length', 'max'=>45),
			array('description, description_full, description_more, specifications, updated_datetime', 'safe'),
			array('sku, manufactor_id, description, description_full, description_more, price, old_price, image, image2, image3, image4, language, specifications, featured, view, published, updated_datetime', 'default', 'setOnEmpty' => true, 'value' => null),
			array('product_id, sku, category_id, tax_id, manufactor_id, title, description, description_full, description_more, price, old_price, image, image2, image3, image4, language, specifications, featured, view, published, updated_datetime', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'shopImages' => array(self::HAS_MANY, 'ShopImage', 'product_id'),
			'category' => array(self::BELONGS_TO, 'ShopCategory', 'category_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'product_id' => Yii::t('app', 'Product'),
			'sku' => Yii::t('app', 'Sku'),
			'category_id' => null,
			'tax_id' => Yii::t('app', 'Tax'),
			'manufactor_id' => Yii::t('app', 'Manufactor'),
			'title' => Yii::t('app', 'Title'),
			'description' => Yii::t('app', 'Description'),
			'description_full' => Yii::t('app', 'Description Full'),
			'description_more' => Yii::t('app', 'Description More'),
			'price' => Yii::t('app', 'Price'),
			'old_price' => Yii::t('app', 'Old Price'),
			'image' => Yii::t('app', 'Image'),
			'image2' => Yii::t('app', 'Image2'),
			'image3' => Yii::t('app', 'Image3'),
			'image4' => Yii::t('app', 'Image4'),
			'language' => Yii::t('app', 'Language'),
			'specifications' => Yii::t('app', 'Specifications'),
			'featured' => Yii::t('app', 'Featured'),
			'view' => Yii::t('app', 'View'),
			'published' => Yii::t('app', 'Published'),
			'updated_datetime' => Yii::t('app', 'Updated Datetime'),
			'shopImages' => null,
			'category' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('product_id', $this->product_id);
		$criteria->compare('sku', $this->sku, true);
		$criteria->compare('category_id', $this->category_id);
		$criteria->compare('tax_id', $this->tax_id);
		$criteria->compare('manufactor_id', $this->manufactor_id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('description_full', $this->description_full, true);
		$criteria->compare('description_more', $this->description_more, true);
		$criteria->compare('price', $this->price, true);
		$criteria->compare('old_price', $this->old_price, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('image2', $this->image2, true);
		$criteria->compare('image3', $this->image3, true);
		$criteria->compare('image4', $this->image4, true);
		$criteria->compare('language', $this->language, true);
		$criteria->compare('specifications', $this->specifications, true);
		$criteria->compare('featured', $this->featured);
		$criteria->compare('view', $this->view);
		$criteria->compare('published', $this->published);
		$criteria->compare('updated_datetime', $this->updated_datetime, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}