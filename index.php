<!--        DENTRO DE ESTE ARCHIVO TENEMOS EL LOGIN -->
<?php
session_start();//      LINEA NECESARIA

if($_POST){//       VER SI EXISTE EL USUARIO Y LA CONTRASENA
    if(($_POST['usuario']=='admin'&&($_POST['contrasena']=='admin'))){
        
        $_SESSION['usuario']="ok";//VARIABLES NECESARIAS PARA QUE FUNCIONE EL INICIO EN LA CABECERA
        $_SESSION['nombreUsuario']="administrador";

        //      SI TODO BIEN, REDIRECCIONAMOS
        header('Location:inicio.php');
    }else{ $mensaje="Error: El usuario o contrasena son incorrectos"; }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body style="background-color: #800080;"> 

    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
          <br/><br/><br/><br/><br/><br/>
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <!-- MENSAJE DE ERROR EN CASO DE QUE NO PUEDA INICIAR SESSION -->
              <?php if(isset($mensaje)){ ?><!-- SI ALGO EN MENSAJE -->
                <div class="alert alert-danger" role="alert">
                  <?php echo $mensaje; ?>
                </div>
              <?php } ?>

              <form method="POST">
                <div class="form-group">
                  <label>Usuario:</label>
                  <input type="text" class="form-control" name="usuario" placeholder="Ingresa tu usuario">
                </div>
                <div class="form-group">
                  <label>Contraseña:</label>
                  <input type="password" class="form-control" name="contrasena" placeholder="Ingresa tu contraseña">
                </div>
                <button type="submit" class="btn btn-primary custom-button">entrar</button>
                <style>
                    .custom-button {
                        background-color: #8A2BE2; /* Reemplaza con el color deseado para el botón */
                    }
                    </style>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>