<?php
// Modelo:  contactos.  Un contacto tiene dos posibles métodos grabe y liste.

function obtenga($em) {
	$file = fopen('contactos.txt', 'r');

	$contacto = NULL;
	while(($nombre = fgets($file)) && !feof($file) && $contacto == NULL)
	{
		$apellidos = fgets($file);
		$tel_c = fgets($file);
		$dir_c = fgets($file);
		$tel_t = fgets($file);
		$dir_t = fgets($file);
		$email = fgets($file);
		if($email===$em."\n")
		{
			$contacto = array('nombre' => $nombre, 'apellidos' => $apellidos, 'tel_c' => $tel_c, 'dir_c' => $dir_c, 'tel_t' => $tel_t, 'dir_t' => $dir_t, 'email' => $email);
		}
	} // while

	fclose($file);
	return $contacto;
}

function grabe($post)
{

	if(obtenga($post['email']) == NULL)
	{
		$file = fopen('contactos.txt', 'a+');
	
		if (fputs($file, $post['nombre']."\n".$post['apellidos']."\n".$post['tel_c']."\n".$post['dir_c']."\n".$post['tel_t']."\n".$post['dir_t']."\n".$post['email']."\n") > 0)
		{
			fclose($file);
			return 1;
		}
		else
		{
			fclose($file);
			return 0;
		}
	}else
	{
		return -1;
	}
}

function liste() {
	$file = fopen('contactos.txt', 'r');

	$contactos = array();
	while(($nombre = fgets($file)) && !feof($file))
	{
		$apellidos = fgets($file);
		$tel_c = fgets($file);
		$dir_c = fgets($file);
		$tel_t = fgets($file);
		$dir_t = fgets($file);
		$email = fgets($file);
		$contacto = array('nombre' => $nombre, 'apellidos' => $apellidos, 'tel_c' => $tel_c, 'dir_c' => $dir_c, 'tel_t' => $tel_t, 'dir_t' => $dir_t, 'email' => $email);
		array_push($contactos, $contacto);
	} // while

	fclose($file);
	return $contactos;
}

// Controlador:

class VisitasController extends Solsoft\ekeke\Controller {
	function index()
	{
		$contactos = liste();
		$this->view->assign('contactos', $contactos);
	}
	
	function agregar()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$res = grabe($_POST);
			if ($res == 1)
			{
				$this->view->assign('tipo','success');
				$this->view->assign('mensaje', 'El contacto se ha almacenado satisfactoriamente.');
			}
			else if($res == 0)
			{
				$this->view->assign('tipo','danger');
				$this->view->assign('mensaje', 'El contacto no se pudo guardar.');
			}
			else
			{
				$this->view->assign('tipo','danger');
				$this->view->assign('mensaje', 'El contacto no se pudo guardar, el correo electr&oacute;nico ya est&aacute; asociado a un contacto.');
			}
			$contacto = array('nombre' => $_POST['nombre'], 'apellidos' => $_POST['apellidos'], 'tel_c' => $_POST['tel_c'], 'dir_c' => $_POST['dir_c'], 'tel_t' => $_POST['tel_t'], 'dir_t' => $_POST['dir_t'], 'email' => $_POST['email']);
			$this->view->assign('contacto', $contacto);
		}else
		{
			$this->view->assign('tipo','info');
			$this->view->assign('mensaje', 'Complete los campos para agregar un nuevo contacto.');
		}
	}
	
	function editar()
	{
		if (isset($_REQUEST['email']))
		{
			if(!empty($_REQUEST['email']))
			{
				$contacto = obtenga($_REQUEST['email']);
				
				if($contacto == NULL)
				{
					$this->view->assign('tipo','danger');
					$this->view->assign('mensaje', 'El correo electr&oacute;nico no existe en ning&uacute;n contacto.');
				}else
				{
					$this->view->assign('contacto', $contacto);
					
					$this->view->assign('tipo','info');
					$this->view->assign('mensaje','Modifique la informaci&oacute;n del contacto.');
				}
			}
			else
			{
				$this->view->assign('tipo','danger');
				$this->view->assign('mensaje','Error al recuperar el correo electr&oacute;nico.');
			}
		}
		else
		{
			$this->view->assign('tipo','danger');
			$this->view->assign('mensaje','Error al recuperar el correo electr&oacute;nico.');
		}
	}
}

?>