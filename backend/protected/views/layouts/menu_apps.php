<?php 
$module = Yii::app()->controller->module->id;
$controller = Yii::app()->controller->getId();
?>
<ul class="main-menu">
	<li>
		<a href="<?php echo Yii::app()->createUrl('/dashboard');?>">
			<i class="fa fa-home"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<li class="has-submenu">
		<a href="#">
			<i class="fa fa-database"></i>
			<span>Quản trị nội dung</span>
		</a>
		<ul class="submenu" style="display: none">
			<li>
				<a href="<?php echo Yii::app()->createUrl('/news/news/admin');?>">
					<i class="fa fa-newspaper-o"></i>
					<span>Quản lý bài viết</span>
				</a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/news/categories/admin');?>">
					<i class="fa fa-cube"></i>
					<span>Quản lý chủ đề</span></a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/files/files/admin');?>"><i class="fa fa-files-o"></i><span>Quản lý File</span></a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/news/pages/admin');?>"><i class="fa fa-pencil-square-o"></i><span><?php echo Yii::t('main','Pages Manager')?></span></a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/menu/menus/admin');?>"><i class="fa fa-align-justify"></i><span><?php echo Yii::t('main','Menu Manager')?></span></a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/gallery/galleryItems/admin');?>">
					<i class="fa fa-photo"></i>
					<span><?php echo Yii::t('main','Gallery Manager')?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/polls/poll/admin');?>">
					<i class="fa fa-tasks"></i>
					<span><?php echo Yii::t('main','Polls Manager')?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/blog/post/admin');?>">
					<i class="fa fa-sticky-note"></i>
					<span><?php echo Yii::t('main','Blog Manager')?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/comment/manage/admin');?>">
					<i class="fa fa-comments"></i>
					<span><?php echo Yii::t('main','Comment Manager')?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/widget/manage/admin');?>">
					<i class="fa fa-cubes"></i>
					<span><?php echo Yii::t('main','Widgets Manager')?></span>
				</a>
			</li>
			<li>
				<a href="<?php echo Yii::app()->createUrl('/translate/filterTranslate/Filterlayout');?>">
					<i class="fa fa-globe"></i>
					<span><?php echo Yii::t('main','Languages Manager')?></span>
				</a>
			</li>
		</ul>
	</li>
	<li class="has-submenu">
		<a href="<?php echo Yii::app()->createUrl('/settings');?>">
			<i class="fa fa-cog"></i>
			<span><?php echo Yii::t('main','Settings')?></span>
		</a>
		<ul class="submenu" style="display: none">
			<li><a class="<?php if($module =='settings' && $controller=='system') echo 'actived';?>" href="<?php echo Yii::app()->createUrl('/settings/system');?>">
					<i class="fa fa-info-circle"></i>
					<span><?php echo Yii::t('main','General Setting')?></span>
				</a></li>
			<li><a class="" href="<?php echo Yii::app()->createUrl('/srbac');?>">
					<i class="fa fa-key"></i>
					<span><?php echo Yii::t('main','Quyền truy cập')?></span>
				</a>
			</li>
		</ul>
	</li>
</ul>
<!--<ul class="menu-top-level">
	<li class="menu-section">
		<div class="menu-section-item">
		<ul class="apps-link">
			<li><a class="yt-valign" href="<?php /*echo Yii::app()->createUrl('/dashboard');*/?>"><i class="glyphicon glyphicon-home"></i>&nbsp;<?php /*echo Yii::t('main','Dashboard')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module =='news' && $controller=='news') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/news/news/admin');*/?>"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;<?php /*echo Yii::t('main','Articles Manager')*/?></a>
				<?php /*if($module =='news' && ($controller=='news' || $controller=='categories') || $module=='files'){*/?>
				<ul class="sub-menu">
					<li><a class="yt-valign <?php /*if($module =='news' && $controller=='categories') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/news/categories/admin');*/?>">+&nbsp;<?php /*echo Yii::t('main','Categories Manager')*/?></a></li>
					<li><a class="yt-valign <?php /*if($module =='files') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/files/files/admin');*/?>">+&nbsp;File Manager</a></li>
				</ul>
				<?php /*}*/?>
			</li>
			<li><a class="yt-valign <?php /*if($module =='news' && $controller=='pages') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/news/pages/admin');*/?>"><i class="glyphicon glyphicon-book icon-blue"></i>&nbsp;<?php /*echo Yii::t('main','Pages Manager')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module=='media') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/media/manage');*/?>"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;<?php /*echo Yii::t('main','Media Manager')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module=='polls') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/polls/poll/admin');*/?>"><i class="glyphicon glyphicon-tasks"></i>&nbsp;<?php /*echo Yii::t('main','Polls Manager')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module=='menu') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/menu/menus/admin');*/?>"><i class="glyphicon glyphicon-align-justify"></i>&nbsp;<?php /*echo Yii::t('main','Menus Manager')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module=='gallery') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/gallery/galleryItems/admin');*/?>"><i class="glyphicon glyphicon-picture"></i>&nbsp;<?php /*echo Yii::t('main','Gallery Manager')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module=='blog' && $controller=='post') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/blog/post/admin');*/?>"><i class="glyphicon glyphicon-pencil"></i>&nbsp;<?php /*echo Yii::t('main','Blog Manager')*/?></a>
				<?php /*if($module =='blog' ){*/?>
				<ul class="sub-menu">
					<li><a class="yt-valign <?php /*if($module =='blog' && $controller=='topic') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/blog/topic/admin');*/?>">+&nbsp;<?php /*echo Yii::t('main','Topic Manager')*/?></a></li>
				</ul>
				<?php /*}*/?>
			</li>
			<li><a class="yt-valign <?php /*if($module=='comment') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/comment/manage/admin');*/?>"><i class="glyphicon glyphicon-comment"></i>&nbsp;<?php /*echo Yii::t('main','Comment Manager')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module=='widget') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/widget/manage/admin');*/?>"><i class="glyphicon glyphicon-th-large"></i>&nbsp;Wigets Manager</a></li>
			<li><a class="yt-valign <?php /*if($module=='translate') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/translate/filterTranslate/Filterlayout');*/?>"><i class="glyphicon glyphicon-globe"></i>&nbsp;<?php /*echo Yii::t('main','Languages Translate')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module=='settings' && $controller=='default') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/settings');*/?>"><i class="glyphicon glyphicon-cog"></i>&nbsp;<?php /*echo Yii::t('main','Settings')*/?></a>
				<?php /*if($module=='settings'){*/?>
				<ul class="sub-menu">
					<li><a class="yt-valign <?php /*if($module =='settings' && $controller=='system') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/settings/system');*/?>"><?php /*echo Yii::t('main','General Setting')*/?></a></li>
				</ul>
				<?php /*}*/?>
			</li>
			<li><a class="yt-valign <?php /*if($module=='MogCategory') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/MogCategory/manager/admin');*/?>"><i class="glyphicon glyphicon-globe"></i>&nbsp;<?php /*echo Yii::t('main','TShirt Category')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module=='MogTshirt') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/MogTshirt/manager/admin');*/?>"><i class="glyphicon glyphicon-globe"></i>&nbsp;<?php /*echo Yii::t('main','TShirt Items')*/?></a></li>
			<li><a class="yt-valign <?php /*if($module=='MogVideo') echo 'actived';*/?>" href="<?php /*echo Yii::app()->createUrl('/MogVideo/manager/admin');*/?>"><i class="glyphicon glyphicon-globe"></i>&nbsp;<?php /*echo Yii::t('main','Quản lý Video')*/?></a></li>
		</ul>
		</div>
	</li>
</ul>-->