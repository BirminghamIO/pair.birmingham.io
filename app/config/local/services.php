<?php

return array(

	'mailgun' => array(
		'domain' => '',
		'secret' => '',
	),

	'mandrill' => array(
		'secret' => '',
	),

	'stripe' => array(
		'model'  => 'User',
		'secret' => '',
	),
    
    'github' => array(
        'client_id'     => $_ENV['OAUTH_GITHUB_CLIENT_ID'],
        'client_secret' => $_ENV['OAUTH_GITHUB_CLIENT_SECRET'],
        'scope'         => array('user'),
    ),

);
