# SimpleHook

This is a library to create &amp; manage simply custom hooks in Codeigniter.

## Installation

Add library SimpleHook.php to your application folder and create a configuration file named simplehook.php

## Usage

you just have to call the function with the hook's name 

	$return = simplehook('first');

*$return* is an array of each functions return , because you can set several functions in a hook.

## Configuration

Each hook must have a specific key and you have to add one array for each callable function/method

	$config['my_hook'] = array(
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

the hook 'first' call two functions :
* a library demo and his method test with params
* a helper function demo without param


## Configurations keys

* __type__ string library|helper
* __param__ boolean true if params send to method/function

if __type__ = library|model
* __class__ string class name
* __method__ string method name

if __type__ = helper
* __helper__ string helper name
* __function__ string function name


