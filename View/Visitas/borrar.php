<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Eliminar Contacto</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<style>
body{
	padding-top: 20px;
}
.detail{
	font-size: 24px;
    line-height: 0.7;
}
#p_mail{
	margin-top: 10px;
}
</style>
<body>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3" style="border: 1px solid gray; border-radius:4px;">
      <h1>Eliminar Contacto</h1>
	  <hr/>
	  <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Volver a la lista de contactos</a></p>
      <div class="alert alert-<?php echo $tipo; ?>" role="alert"><?php echo $mensaje; ?></div>
      <h1><strong><?php echo $contacto['nombre']; ?> <?php echo $contacto['apellidos']; ?></strong></h1>
	  <div class="row">
	  <div class="col-lg-6">
	  <p class="detail"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $contacto['tel_c']; ?></p>
	  <p class="detail"><i class="fa fa-home" aria-hidden="true"></i> <?php echo $contacto['dir_c']; ?></p>
	  </div>
	  <div class="col-lg-6">
	  <p class="detail"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $contacto['tel_t']; ?></p>
	  <p class="detail"><i class="fa fa-building" aria-hidden="true"></i> <?php echo $contacto['dir_t']; ?></p>
	  </div>
	  </div>
	  <p id="p_mail" class="detail"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $contacto['email']; ?></p>
	  <hr/>
	  <form  method="post" style="margin-bottom:15px;">
	  
	  <input type="hidden" name="email" value="<?php echo $contacto['email']; ?>">
        
        <button name="Enviar" type="submit" class="btn btn-success"  id="Enviar">Eliminar</button>
        <a class="btn btn-danger" href="<?php echo $_SERVER['PHP_SELF']; ?>">Cancelar</a>
      </form>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>