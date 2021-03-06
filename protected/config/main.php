<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Блог О Web',
    'defaultController'=>'post',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'lex',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

	),
    'language' => 'ru',
    'theme'=>'blackboot',
    // application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

        'clientScript' => array(
            'scriptMap' => array(
//                'jquery.js' => false,
            )
        ),
        // uncomment the following to enable URLs in path-format

		'urlManager'=>array(
            'showScriptName' => false, //hide index.php from url
			'urlFormat'=>'path',
			'rules'=>array(
                'post/<id:\d+>/<seo_url:.*?>'=>'post/view',
                'post/view/<id:\d+>'=>'post/view',
                'posts/<tag:.*?>'=>'post/index',
                'page/<view:\w+>' => 'site/page',
                'post/category/<category_id:\d+>/<name:.*?>'=>'post/index',
                'post/update/<id:\d+>'=>'post/update',
                'rss.xml'=>'post/feed',
                'comment/update/<id:\d+>'=>'comment/update',
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
            'urlSuffix'=>'.html'
		),

		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
        'cache'=>array(
            'class'=>'CDbCache',
            'connectionID'=>'db',
        ),
        'db'=>array(
            'class'=>'system.db.CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=blog',
            'schemaCachingDuration'=>3600,
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
            'tablePrefix' => 'tbl_',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
		'adminEmail'=>'lex24@ukr.net',
        'onPage'=>10,
        'commentNeedApproval'=>true,
        'tagCloudCount'=>20,
        'recentCommentCount'=>10,
	),
);