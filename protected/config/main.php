<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Plataforma de Registro de Prestamos',
        'defaultController' => 'site/login',
        'language' => 'es',
    
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
			'password'=>'1qazxsw2',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*'),
		),
            'dsolicitud',
            'dsolicitante',
            'dmaxprestamos',
            'dsolicitanteprestamo',
            'dcuotasprestamo',

		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
             'ePdf' => array(
            'class' => 'application.extensions.yii-pdf.EYiiPdf',
            'params' => array(
                'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendor.html2pdf.*',
                    'classFile' => 'html2pdf.class.php', // For adding to Yii::$classMap
                    'defaultParams' => array(// More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                        'orientation' => 'P', // landscape or portrait orientation
                        'format' => 'Letter', // format A4, A5, ...
                        'language' => 'es', // language: fr, en, it ...
                        'unicode' => true, // TRUE means clustering the input text IS unicode (default = true)
                        'encoding' => 'UTF-8', // charset encoding; Default is UTF-8
                        'marges' => array(12, 20, 12, 12), // margins by default, in order (left, top, right, bottom)
                    )
                ),
                'TCPDFBarcode' => array(//_tcpdf_5.0.002
                    'librarySourcePath' => 'application.vendor.html2pdf._tcpdf_.*',
                    'classFile' => 'barcodes.php',
                )
            ),
        ),
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=192.168.81.49;dbname=prestamos',
			'emulatePrepare' => true,
			'username' => 'prestamos',
			'password' => '1qazxsw2',
			'charset' => 'utf8',
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
            'correo' => array(
            'class' => 'application.messages.correo'
        ),
	),
    
    'params' => array(
//        'adminEmail'=>'webmaster@example.com',
        'adminEmail' => 'sistemas@saime.gob.ve',
        'SMTPHost' => 'smtp.gmail.com',
        'SMTPUsername' => 'anderespinoza@gmail.com',
        'SMTPPassword' => 'anderson4452',
        'SMTPPort' => 25,
        
    ),
        
	
);