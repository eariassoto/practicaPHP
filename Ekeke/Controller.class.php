<?php

/**
 * Controller class
 *
 * @author Braulio José Solano Rojas
 * @copyright Copyright (c) 2007 Solsoft de Costa Rica S.A.
 * @version $Id: class.controller.php,v 1.1 2008/01/21 01:08:16 solsoft Exp $
 * @access public
 **/

namespace Solsoft\ekeke;

class Controller
{
	/**
	 * Controller::__contruct()  Constructor.  It will call a action coming from
	 * REQUEST.  The action must be a method of this Class.
	 *
	 * @return void
	 */
	function __construct()
	{
		if (!isset($_REQUEST['action']))
		{
			$this->view = new Template('index', TEMPLATE_DIR.str_replace('Controller', '', get_class($this)).DS);
			$this->index();
			echo $this->view->render();
		}
		elseif (method_exists($this, $_REQUEST['action']))
		{
			$this->view = new Template($_REQUEST['action'], TEMPLATE_DIR.str_replace('Controller', '', get_class($this)).DS);
			call_user_func(array($this, $_REQUEST['action']));
			echo $this->view->render();
		}
		else
		{
			throw new Exception('Undefined action');
		}
	}
}

?>