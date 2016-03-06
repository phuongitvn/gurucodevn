<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');?>
<script type="text/javascript">
$(function() {
	$( "#tabs-news" ).tabs();
});
</script>
<div class="form">
<?php 
$form = $this->beginWidget('GxActiveForm', array(
	'id' => 'news-form',
	'enableAjaxValidation' => false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data', 'name'=>'news-form','class'=>'basic-form inline-form'),
));
?>

<div id="tabs-news">
	<ul>
		<li><a href="#main-news"><?php echo Yii::t('main','Article Info')?></a></li>
		<li><a href="#add-files"><?php echo Yii::t('main','Files Attach')?></a></li>
	</ul>
	<div id="main-news">
		<?php echo $form->errorSummary($model); ?>
		<div class="row">
			<div class="col-md-2">
				<label><?php echo Yii::t('main','Ảnh Thumb')?></label>
			</div>
			<div class="col-md-10">
			<div id="img_tmp"><img src="<?php echo ($model->isNewRecord)?Yii::app()->theme->baseUrl."/images/no_image.png":AvatarHelper::getAvatarUrl($model->id, "s1","news")?>" /></div>
			<?php
			$this->widget('ext.EAjaxUpload.EAjaxUpload',
				array(
					'id'=>'uploadFile',
					'config'=>array(
						'action'=>Yii::app()->createUrl('/site/upload'),
						'allowedExtensions'=>array("jpg","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
						'sizeLimit'=>10*1024*1024,// maximum file size in bytes
						'minSizeLimit'=>1,// minimum file size in bytes
						'onComplete'=>"js:function(id, fileName, responseJSON){
			        			$('#img_tmp').html('<img width=\"200\" src=\"".Yii::app()->params['storage_url']."/tmp/"."'+fileName+'\" />');
								$('#BackendNewsModel_file').attr('value',fileName)
							}",
					)
				));
			?>
			</div>
			<?php echo CHtml::hiddenField('BackendNewsModel[file]')?>
		</div>
		<div class="row">
			<div class="col-md-2">
			<?php echo $form->labelEx($model,'status'); ?>
			</div>
			<div class="col-md-10">
				<?php echo $form->dropDownList($model,'status',BackendLookupModel::items('NewsStatus'), array('style'=>'width: 150px;')); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<?php echo $form->labelEx($model,'title'); ?>
			</div>
			<div class="col-md-10">
				<?php echo $form->textField($model, 'title', array('maxlength' => 255, 'class'=>'form-control')); ?>
				<?php echo $form->error($model,'title'); ?>
			</div>
		</div><!-- row -->
		<div class="row">
			<div class="col-md-2">
			<?php echo $form->labelEx($model,'alias'); ?>
			</div>
			<div class="col-md-10">
			<?php echo $form->textField($model, 'alias', array('class'=>'textField-l txtrcv')); ?>
			<?php echo $form->error($model,'alias'); ?>
			</div>
		</div><!-- row -->
		<div class="row">
			<div class="col-md-2">
			<?php echo $form->labelEx($model,'catid'); ?>
			</div>
			<div class="col-md-10">
			<?php
				$call_cats =BackendCategoriesModel::model()->findAll('published=:p ORDER BY position ASC', array(':p'=>1));
				$cats = CHtml::listData($call_cats, 'id', 'title_tree');
				echo $form->dropDownList($model,'catid', $cats);

			?>
			<?php echo $form->error($model,'catid'); ?>
			</div>
		</div><!-- row -->
		<div class="row">
			<div class="col-md-2">
			<?php echo $form->labelEx($model,'introtext'); ?>
			</div>
			<div class="col-md-10">
			<?php
			$this->widget('ImperaviRedactorWidget', array(
				'model' => $model,
				'attribute' => 'introtext',
				'options' => array(
					'lang' => 'en',
					'minHeight'=>200,
					'placeholder'=>Yii::t('main','Giới thiệu ngắn')
				),
				'plugins' => array(
				),
			));
			  //echo $form->textArea($model, 'introtext');
			?>
			<?php echo $form->error($model,'introtext'); ?>
			</div>
		</div><!-- row -->
		<div class="row">
			<div class="col-md-2">
			<?php echo $form->labelEx($model,'fulltext'); ?>
			</div>
			<div class="col-md-10">
			<?php
			$this->widget('ImperaviRedactorWidget', array(
				'model' => $model,
				'attribute' => 'fulltext',
				'options' => array(
					'lang' => 'en',
					'imageUpload'=> '/upload.php',
					'imageManagerJson'=>'/backend/js/imagemanager.json',
					'minHeight'=>300,
					'placeholder'=>Yii::t('main','Nhập nội dung')
				),
				'plugins' => array(
					'fullscreen' => array(
						'js' => array('fullscreen.js',),
					),
					'clips' => array(
						// You can set base path to assets
						//'basePath' => 'application.components.imperavi.my_plugin',
						// or url, basePath will be ignored.
						// Defaults is url to plugis dir from assets
						//'baseUrl' => '/js/my_plugin',
						'css' => array('clips.css',),
						'js' => array('clips.js',),
						// add depends packages
						'depends' => array('imperavi-redactor',),
					),
					'imagemanager' => array(
						'js' => array('imagemanager.js'),
					)
				),
			));
			  //echo $form->textArea($model, 'fulltext');
			?>
			<?php echo $form->error($model,'fulltext'); ?>
			</div>
		</div><!-- row -->
		<div class="row">
			<div class="col-md-2">
			<?php echo $form->labelEx($model,'ordering'); ?>
			</div>
			<div class="col-md-10">
			<?php echo $form->textField($model, 'ordering'); ?>
			<?php echo $form->error($model,'ordering'); ?>
			</div>
		</div><!-- row -->
		<div class="row">
			<div class="col-md-2">
			<?php echo $form->labelEx($model,'metakey'); ?>
			</div>
			<div class="col-md-10">
			<?php echo $form->textArea($model, 'metakey', array('class'=>'textarea-m')); ?>
			<?php echo $form->error($model,'metakey'); ?>
			</div>
		</div><!-- row -->
		<div class="row">
			<div class="col-md-2">
			<?php echo $form->labelEx($model,'metadesc'); ?>
			</div>
			<div class="col-md-10">
			<?php echo $form->textArea($model, 'metadesc', array('class'=>'textarea-m')); ?>
			<?php echo $form->error($model,'metadesc'); ?>
			</div>
		</div><!-- row -->
		<div class="row">
			<div class="col-md-2">
			<?php echo $form->labelEx($model,'comment'); ?>
			</div>
			<div class="col-md-10">
			<?php echo $form->checkBox($model, 'comment', array('class'=>'icheck-blue')); ?>
			<?php echo $form->error($model,'comment'); ?>
			</div>
		</div>
	</div>
	<div id="add-files">
		<a style="color: #fff;float: right;" id="files-list" class="btn btn-success small"><i class="icon-plus-sign icon-white"></i>Thêm file</a>
		<div style="clear: both" id="file-added">
			<?php 
			$fileAttached = BackendContentFilesModel::model()->getFileByContent($model->id);
			if($fileAttached){
					foreach ($fileAttached as $key => $file){
						echo '<div class="row-file" id="f_'.$file['id'].'">'.$file['source_path'].'&nbsp;<a style="color: #fff;" onclick="removeFile(\''.$file['id'].'\')" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Xóa</a></div>';	
					}
				} 
			?>
		</div>
	</div>
</div>
<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->

<script type="text/javascript">
function DelImage(type,id){
	if(confirm('<?php echo Yii::t('main','Are you sure to want to delete this image?');?>')){
		jQuery.ajax({
			url: '<?php echo Yii::app()->createUrl('/news/news/delimage');?>',
			data: {type:type, id:id},
			dataType:'json',
			success: function(data){
		   		if(data.error==false){
					jQuery("#wb-del-"+type).html("");   	
					jQuery("#uploaded_"+type).html("<img src=\"/backend/themes/default/images/default.gif\">");   	
			  	}
			}
		})
	}
}
</script>
<div id="files-list-data"></div>
<script type="text/javascript">
    $("#files-list").click(function ()    {
        $('#files-list-data').html('<iframe frameborder="0" width="800" height="450" src="<?php echo Yii::app()->createUrl('/files/files/listAjax')?>"></iframe>')
        .dialog({
            modal: true,
            dialogClass: 'dialog-chose',
            //buttons: {"Chose":function(){alert('chosed')}},
            height: 550,
            width: 830,
            title: 'Danh sách file upload'
        });
    });
</script>
<?php if($model->id):?>
<script>
function selectFile(id, fileName) {
	$.ajax({
	  url: "<?php echo Yii::app()->createUrl('/files/files/getFile')?>",
	  data: {file_id: id, content_id:<?php echo $model->id;?>},
	  success: function(data){
		  var html = '<div class="row-file" id="f_'+id+'">'+fileName+'&nbsp;<a style="color: #fff;" onclick="removeFile(\''+id+'\')" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Xóa</a></div>';
		  $("#file-added").append(html);
	  }
	});
	$("#files-list-data").dialog("close");
}
function removeFile(file_id)
{
	$.ajax({
		  url: "<?php echo Yii::app()->createUrl('/files/files/removeFile')?>",
		  data: {file_id: file_id, content_id:<?php echo $model->id;?>},
		  success: function(data){
			  $("#f_"+file_id).remove();
		  }
		});
	return false;
}
</script>
<?php endif;?>