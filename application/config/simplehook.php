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
	)
);