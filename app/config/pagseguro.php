<?php

return array(

	'environment' => 'production',

	'credentials' => array(
		'email' => "isonhei@isonhei.com.br",
		'token' => array(
			'production' => '1404775579034AA28B8BAB75D9EC6188',
			'sandbox' => 'A4DF9E21901645148D06DD88E375CF67'
		)
	),
	'application' => array(
		'charset' => 'UTF-8'
	),
	'log' => array(
		'active' => true,
		'fileLocation' => storage_path().'/logs/pagseguro.log'
	)

);
