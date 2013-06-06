# SimpleHook

Codeigniter Library to create &amp; manage custom hooks.

## Installation

Add library SimpleHook.php to your application folder and create a configuration file named simplehook.php

## Usage

you just have to call the function with the hook's name 
```php
$return = simplehook('first');
```

*$return* is an array of each functions return , because you can set several functions in a hook.

## Configuration

Each hook must have a specific key and you have to add one array for each callable function/method
```php
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
```

the hook 'first' call two functions :
* a library demo and his method test with params
* a helper function demo without param


## Configurations keys

* __type__ string library|helper|rest|model
* __param__ boolean true if params send to method/function

if __type__ = library|model
* __class__ string class name
* __method__ string method name

if __type__ = helper
* __helper__ string helper name
* __function__ string function name

if __type__ = rest
* __url__ string url to call
* __method__ string POST|GET


