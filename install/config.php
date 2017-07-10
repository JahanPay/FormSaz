<?php

return array(
	'timeZone' => 'Asia/Tehran' ,
	'baseUrl'=>NULL , // if is null set automatic alse use http://example.com
	'import'=>array(
		'core/classes',
		'protected/models',
		'protected/components',
	),
	
	'components'=>array(
		'router'=>array(
			'class'=>'CRouter',
			'defaultAction'=>'index',
			'defaultController'=>'main',
		),
		
		'profiler'=>array(
			'class'=>'CProfiler'
		),
		
		/*'db'=>array(
			'class'=>'CRxDB' ,
			'username'=>'postgres',
			'password'=>'demo',
			'dbname'=>'webshomar',
			'dbhost'=>'127.0.0.1',
		),*/
		
		/*'session'=>array(
			'class'=>'CSession',
			'savePath'=>'protected/runtime/session' ,
			'reGenerate'=> 60, // second to new sessId 
		),
		*/
		'cache'=>array(
			'class'=>'CCache',
			'path'=>'protected/runtime/cache/',
			'prefix'=>'c_'
		),
		

		/*'user'=>array(
			'class'=>'CUser',
			'timeout'=>43200 , //sec
		),*/
		
		
		
	),
);