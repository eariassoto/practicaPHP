<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agregar Contacto</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3" style="border: 1px solid gray; border-radius:4px;">
      <h1>Editar Contacto</h1>
      <div class="alert alert-<?php echo $tipo; ?>" role="alert"><?php echo $mensaje; ?></div>
      <hr/>
      <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Volver a la lista de contactos</a></p>
      
      <form  method="post" style="margin-bottom:15px;">
      
        <div class="form-group">
          <label>Nombre</label>
          <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $contacto['nombre']; ?>" required>
        </div>
        <div class="form-group">
          <label>Apellidos</label>
          <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?php echo $contacto['apellidos']; ?>"  required>
        </div>
        <div class="form-group">
          <label>Teléfono de la casa</label>
          <input type="tel" class="form-control" name="tel_c" placeholder="Formato: 9999-9999" pattern="\d{4}[\-]\d{4}" value="<?php echo $contacto['tel_c']; ?>"  required>
        </div>
        <div class="form-group">
          <label>Dirección de la casa</label>
          <input type="text" class="form-control" name="dir_c" placeholder="Dirección" value="<?php echo $contacto['dir_c']; ?>"  required>
        </div>
        <div class="form-group">
          <label>Teléfono del trabajo</label>
          <input type="text" class="form-control" name="tel_t" placeholder="Formato: 9999-9999" pattern="\d{4}[\-]\d{4}" value="<?php echo $contacto['tel_t']; ?>"  required>
        </div>
        <div class="form-group">
          <label>Dirección del trabajo</label>
          <input type="text" class="form-control" name="dir_t" placeholder="Dirección" value="<?php echo $contacto['dir_t']; ?>"  required>
        </div>
         <div class="form-group">
          <label>Correo electrónico</label>
          <input type="email" class="form-control" name="email" placeholder="Formato: example@mail.com" value="<?php echo $contacto['email']; ?>"  required>
        </div>
        <button name="Enviar" type="submit" class="btn btn-primary"  id="Enviar">Editar</button>
        <a class="btn btn-danger" href="<?php echo $_SERVER['PHP_SELF']; ?>">Cancelar</a>
      </form>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>