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


## configurations keys

* _type_ string library|helper

if _type_ = library
* _class_ string class name
* _method_ string method name

if _type_ = helper
* _helper_ string helper name
* _function_ string function name

* _param_ boolean true if params send to method/function
