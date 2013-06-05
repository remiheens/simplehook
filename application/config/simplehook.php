<?php

$config['simplehook'] = array(
	'first' => 	array(
		array(
			'type' => 'library',
			'class' => 'demo',
			'method' => 'test',
			'param' => true
		),
		array(
			'type' => 'helper',
			'helper' => 'demo',
			'function' => 'demo'
		)
	),
	'second' =>	array(
		array(
			'type' => 'rest',
			'url' => 'https://api.twitter.com/1.1/search/tweets.json',
			'method' => 'get',
			'param' => true
		)
	)
);