<html>
<head>
<meta charset="UTF-8">
<title>Mis contactos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1>Mis Contactos</h1>
      <hr/>
      <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=agregar">Agregar un contacto nuevo</a></p>
      <table class="table table-bordered table-hover table-striped" >
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono Casa</th>
            <th>Dirección Casa</th>
            <th>Teléfono Trabajo</th>
            <th>Dirección Trabajo</th>
            <th>Correo electrónico</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($contactos as $contacto)
		  {
		  ?>
        <tr>
          <td><?php echo $contacto['nombre']; ?></td>
          <td><?php echo $contacto['apellidos']; ?></td>
          <td><?php echo $contacto['tel_c']; ?></td>
          <td><?php echo $contacto['dir_c']; ?></td>
          <td><?php echo $contacto['tel_t']; ?></td>
          <td><?php echo $contacto['dir_t']; ?></td>
          <td><a href="mailto:<?php echo $contacto['email']; ?>" target="_top"><?php echo $contacto['email']; ?></a></td>
          <td><a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']; ?>?action=editar&email=<?php echo $contacto['email']; ?>" role="button">Editar</a></td>
          <td><a class="btn btn-danger" href="<?php echo $_SERVER['PHP_SELF']; ?>?action=borrar&email=<?php echo $contacto['email']; ?>" role="button">Borrar</a></td>
        </tr>
        <?php
        }
		?>
        </tbody>  
      </table>
      <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=agregar">Agregar un contacto nuevo</a></p>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>