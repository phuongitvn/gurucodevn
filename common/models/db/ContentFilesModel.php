<?php

Yii::import('common.models.db._base.BaseContentFilesModel');

class ContentFilesModel extends BaseContentFilesModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}