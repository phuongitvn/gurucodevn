<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
	require_once dirname(__FILE__).'../../../common/config/common.php',
	array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Video Hot',
	'theme'=>'fan2clip',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.portlets.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	),

	// application components
	'components'=>array(
        'cache' => array(
            'class' => 'system.caching.CFileCache'
        ),
        'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			/* 'rules'=>array(
				''=>'site/index',
				'<action:(login|logout|about|index)>' => 'site/<action>',
				'<controller:(software|pricing|casestudies|testimonials|blog)>' => '<controller>/index',
				'<alias>'=>'site/page',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			), */
			'rules'=>array(
				'home'=>'site/index',
				'<action:(login|logout|about|index|checktimeliked|yahoo)>' => 'site/<action>',
                'video/<genre_key:[a-zA-Z0-9-]+>' => 'video/genre',
                '<_c:\w+>/<url_key:[a-zA-Z0-9-]+>,<id:\w+>' => '<_c>/view',
                '<_c:\w+>' => '<_c>/index',
				'<_c:\w+>/<_a:\w+>/<id:\w+>' => '<_c>/<_a>',
				'<_c:\w+>/<_a:\w+>' => '<_c>/<_a>',
			),
			'urlSuffix'		=>	'.html',
			'showScriptName'=>false,
		),
		
		// uncomment the following to use a MySQL database
		/* 'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		), */
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, traces',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'postsPerPage'=>20,
		'tagCloudCount'=>20,
		'local_mode'=>1
	),
	)
);