<?php 
$this->btnOptions = '<a class="btn btn-sm btn-primary" onclick="jQuery(\'#product-translate-form\').submit();">'.Yii::t('main','Save').'</a>';
$this->btnOptions .='&nbsp;<a class="btn btn-sm btn-primary" href="'.Yii::app()->createUrl('/translate/filterTranslate/Filterlayout').'">'.Yii::t('main', 'Close').'</a>';
?>
<?php
$params_filter = Yii::app()->user->getState('paramsTrans');
$languages = Yii::app()->params['languages'];
$trans_elements = @unserialize($data['trans_content']);
$trans_elements = is_array($trans_elements)?$trans_elements:false;
?>

<div class="form">
<div><?php echo Yii::app()->user->getFlash('msg');?></div>
<form method="post" action="" id="product-translate-form">
<div class="row">
<label><?php echo Yii::t('app','Published')?></label>
<input type="checkbox" name="t_published" <?php if($data && $data['published']==1) echo 'checked';?>/>
</div>
<div class="row">
<label><?php echo Yii::t('app','Title')?></label>
<input class="textField-l" readonly="readonly" disabled="disabled" type="text" name="title" value="<?php echo $data['title'];?>" />
</div>
<div class="row">
<label><?php echo Yii::t('app','Title').'&nbsp('.$languages[$params_filter['language']].')';?></label>
<input class="textField-l" type="text" name="BackendTranslatesModel[title]" value="<?php if(isset($trans_elements['title'])) echo $trans_elements['title'];?>" />
</div>

<div class="row">
<label><?php echo Yii::t('app','Description');?></label>
<div style="float:left;width: 98%;background: #EBEBE4;padding: 10px;border: 1px solid #999;overflow: hidden"><?php echo $data['description'];?></div>
</div>
<div class="row">
<label ><?php echo Yii::t('app','Description').'&nbsp('.$languages[$params_filter['language']].')';?></label>
<?php
		$this->widget('application.extensions.elrte.elRTE', array(
		    'selector'=>'BackendTranslatesModel_description',
		    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
		    'cssClass' => 'el-rte',
		    'absoluteURLs' => 'false',
		    'allowSource' => 'true',
		    'lang' => 'en',
		    'styleWithCSS' => 'true',
		    'height' => '500',
		    'width' => '100%',
		    'fmAllow' => 'true',
		    'toolbar' => 'maxi',
		 ));
		?>
		<textarea name="BackendTranslatesModel[description]" id="BackendTranslatesModel_description" ><?php if(isset($trans_elements['description'])) echo $trans_elements['description'];?></textarea>
</div>

<div class="row">
<label><?php echo Yii::t('app','Description Full');?></label>
<div style="float:left;width: 98%;background: #EBEBE4;padding: 10px;border: 1px solid #999;overflow: hidden"><?php echo $data['description_full'];?></div>
</div>
<div class="row">
<label ><?php echo Yii::t('app','Description Full').'&nbsp('.$languages[$params_filter['language']].')';?></label>
<?php
		$this->widget('application.extensions.elrte.elRTE', array(
		    'selector'=>'BackendTranslatesModel_description_full',
		    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
		    'cssClass' => 'el-rte',
		    'absoluteURLs' => 'false',
		    'allowSource' => 'true',
		    'lang' => 'en',
		    'styleWithCSS' => 'true',
		    'height' => '500',
		    'width' => '100%',
		    'fmAllow' => 'true',
		    'toolbar' => 'maxi',
		 ));
		?>
		<textarea name="BackendTranslatesModel[description_full]" id="BackendTranslatesModel_description_full" ><?php if(isset($trans_elements['description_full'])) echo $trans_elements['description_full'];?></textarea>
</div>

<div class="row">
<label><?php echo Yii::t('app','Description More');?></label>
<div style="float:left;width: 98%;background: #EBEBE4;padding: 10px;border: 1px solid #999;overflow: hidden"><?php echo $data['description_more'];?></div>
</div>
<div class="row">
<label ><?php echo Yii::t('app','Description More').'&nbsp('.$languages[$params_filter['language']].')';?></label>
<?php
		$this->widget('application.extensions.elrte.elRTE', array(
		    'selector'=>'BackendTranslatesModel_description_more',
		    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
		    'cssClass' => 'el-rte',
		    'absoluteURLs' => 'false',
		    'allowSource' => 'true',
		    'lang' => 'en',
		    'styleWithCSS' => 'true',
		    'height' => '500',
		    'width' => '100%',
		    'fmAllow' => 'true',
		    'toolbar' => 'maxi',
		 ));
		?>
		<textarea name="BackendTranslatesModel[description_more]" id="BackendTranslatesModel_description_more" ><?php if(isset($trans_elements['description_more'])) echo $trans_elements['description_more'];?></textarea>
</div>

<input type="hidden" name="tt_id" value="<?php echo $data['tid'];?>" />
</form>
</div>
