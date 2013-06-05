<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter SimpleHook Library
 *
 * A library to create and manage hook in your project.
 *
 * @package		CodeIgniter
 * @author		Remi Heens | www.remiheens.fr | ci@remiheens.fr
 * @copyright	Copyright (c) 2013, Remi Heens.
 * @license		http://www.opensource.org/licenses/mit-license.php
 * @link		http://www.remiheens.fr
 * @version		Version 0.1
 *
 */
class SimpleHook
{
	private $CI;
	private $config;
	private $name;
	
	public function __construct()
	{
		$this->CI = & get_instance();
		$this->CI->config->load('simplehook');
		$this->config = $this->CI->config->item('simplehook');
	}

	/**
	 * @scope public
	 * @param $name string the name of the hook
	 */
	public function set($name = '')
	{
		if(isset($name) && !empty($name))
		{
			$this->name = $name;
		}
	}
	
	/**
	 * @scope public
	 * @param $args mixed array of arguments
	 * @return $returns mixed each return statement for each 
	 */
	public function run($args = '')
	{
		$returns = array();
		if(isset($this->name) && !empty($this->name) && isset($this->config[$this->name]) && !empty($this->config[$this->name]))
		{
			foreach($this->config[$this->name] as $hook)
			{
				switch($hook['type'])
				{
					case 'library':
						if(isset($hook['class']) && !empty($hook['class']) && isset($hook['method']) && !empty($hook['method']))
						{
							$class = $hook['class'];
							$method = $hook['method'];
							$this->CI->load->library($class);
							if(isset($hook['param']) && $hook['param'] === true && isset($args) && !empty($args) )
							{
								$returns[$class.'::'.$method] = call_user_func_array(array($this->CI->$class,$method),$args);
							}
							else
							{
								$returns[$class.'::'.$method] = $this->CI->$class->$method();
							}
						}
						
					break;
					case 'helper':
						if(isset($hook['helper']) && !empty($hook['helper']) && isset($hook['function']) && !empty($hook['function']))
						{
							$helper = $hook['helper'];
							$function = $hook['function'];
							$this->CI->load->helper($helper);
							
							if(isset($hook['param']) && $hook['param'] === true && isset($args) && !empty($args))
							{
								$returns[$function] = call_user_func_array($function,$args);
							}
							else
							{
								$returns[$function] = $function();
							}
						}
					break;
				}
			}
		}
		
		return $returns;
	}
}

function simplehook($name = '')
{
	$numargs = func_num_args();
	$hook = new SimpleHook();
	$hook->set($name);
	if ($numargs >= 2)
	{
		$arg_list = func_get_args();
		array_shift($arg_list);
		return $hook->run($arg_list);
	}
	else
	{
		return $hook->run();
	}
}
