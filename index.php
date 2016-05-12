<?php

define('DS', DIRECTORY_SEPARATOR);
define('TEMPLATE_DIR', 'View' . DS);
define('BASE_DIR', getcwd() . DS);

// Acá debería haber algún tipo de boostrapping o un llamado a una clase que
// se encargue de hacerlo.
//
// Ver un ejemplo en:  http://phpsnaps.com/snaps/view/bootstrap-php-code/
//
// Por supuesto, adaptado a la estructura que estamos manejando.

spl_autoload_register(
	function ($class)
	{
		preg_match('/^(?<name>\w+)(?<function>Controller){1}$/', $class, $matches);
		switch (@$matches['function']) {
			case 'Controller':
				require_once('Controller' . DS . $class . '.php');
				break;
			default:
				if (strpos($class, 'Solsoft\\ekeke\\') !== FALSE) {
					$class = str_replace('Solsoft\\ekeke\\', '', $class);
					require_once('Ekeke' . DS . $class . '.class.php');
				}
		} // switch
	}
);

$visitasController = new VisitasController();

?>