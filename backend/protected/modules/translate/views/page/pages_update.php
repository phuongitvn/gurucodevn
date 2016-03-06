<?php 
$this->btnOptions = '<a class="btn btn-sm btn-primary" onclick="jQuery(\'#page-translate-form\').submit();">'.Yii::t('main','Save').'</a>';
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
<form method="post" action="" id="page-translate-form">
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
<label><?php echo Yii::t('app','Alias');?></label>
<input class="textField-l" disabled="disabled" type="text" name="alias" value="<?php echo $data['alias'];?>" />
</div>
<div class="row">
<label><?php echo Yii::t('app','Alias').'&nbsp('.$languages[$params_filter['language']].')'?></label>
<input class="textField-l" type="text" name="BackendTranslatesModel[alias]" value="<?php if(isset($trans_elements['alias'])) echo $trans_elements['alias'];?>" />
</div>


<div class="row">
<label><?php echo Yii::t('app','Fulltext');?></label>
<div style="float:left;width: 98%;background: #EBEBE4;padding: 10px;border: 1px solid #999;overflow: hidden"><?php echo $data['fulltext'];?></div>
</div>
<div class="row">
<label ><?php echo Yii::t('app','Fulltext').'&nbsp('.$languages[$params_filter['language']].')';?></label>
<?php
		$this->widget('application.extensions.elrte.elRTE', array(
		    'selector'=>'BackendTranslatesModel_fulltext',
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
		<textarea name="BackendTranslatesModel[fulltext]" id="BackendTranslatesModel_fulltext" ><?php if(isset($trans_elements['fulltext'])) echo $trans_elements['fulltext'];?></textarea>
</div>

<!-- Metakey -->
<div class="row">
<label><?php echo Yii::t('app','Metakey');?></label>
<div style="clear: both;width: 98%;background: #EBEBE4;padding: 10px;border: 1px solid #999;overflow: hidden"><?php if(isset($data['metakey'])) echo $data['metakey'];?></div>
</div>
<div class="row">
<label><?php echo Yii::t('app','Metakey').'&nbsp('.$languages[$params_filter['language']].')'?></label>
<textarea class="textarea-m" name="BackendTranslatesModel[metakey]" ><?php if(isset($trans_elements['metakey'])) echo $trans_elements['metakey'];?></textarea>
</div>

<!-- Meta desc -->
<div class="row">
<label><?php echo Yii::t('app','Meta Desc');?></label>
<div style="clear: both;width: 98%;background: #EBEBE4;padding: 10px;border: 1px solid #999;overflow: hidden"><?php if(isset($data['metadesc'])) echo $data['metadesc'];?></div>
</div>
<div class="row">
<label><?php echo Yii::t('app','Meta Desc').'&nbsp('.$languages[$params_filter['language']].')'?></label>
<textarea class="textarea-m" name="BackendTranslatesModel[metadesc]" ><?php if(isset($trans_elements['metadesc'])) echo $trans_elements['metadesc'];?></textarea>
</div>

<input type="hidden" name="tt_id" value="<?php echo $data['tid'];?>" />
</form>
</div>
