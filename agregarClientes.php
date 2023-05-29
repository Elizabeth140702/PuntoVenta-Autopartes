<?php include("template/cabecera.php"); 
//      ESTA ES LA CABECERA DE LA PAGINA ?>

<?php

$NombreC=(isset($_POST['NombreC']))?$_POST['NombreC']:"";
$TelefonoC=(isset($_POST['TelefonoC']))?$_POST['TelefonoC']:"";
$CorreoC=(isset($_POST['CorreoC']))?$_POST['CorreoC']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

//      EN ESTA PARTE OBTENEMOS ACCESO AL ARCHIVO DE CONFIGURACION
include("configuracion/bd.php"); 

//      HACER QUE REACCION A DIFERENTES SITUACIONES
switch($accion){
    case "agregar":
        //INSERT INTO `empleados` (`idEmpleado`, `imagenE`, `NombreE`, `TelefonoE`, `CorreoE`) VALUES (NULL, 'imagen.jpg', 'Elizabeth', '3330604000', 'elizabeth@gmail.com');
        $sentenciaSQL=$conexion->prepare("INSERT INTO clientes (NombreC, TelefonoC, CorreoC) VALUES (:NombreC, :TelefonoC, :CorreoC);");
        $sentenciaSQL->bindParam(':NombreC', $NombreC);
        $sentenciaSQL->bindParam(':TelefonoC', $TelefonoC);
        $sentenciaSQL->bindParam(':CorreoC', $CorreoC);
        $sentenciaSQL->execute();
        
        // Mostrar ventana emergente al agregar exitosamente
        echo '<script>alert("Cliente agregado exitosamente");</script>';
        break;
}
?>

<div class="col-md-7">
<form method= "POST" enctype="multipart/form-data">

    <div class="card">
        <div class="card-header">
            AGREGAR CLIENTES
        </div>
        
        <div class="card-body">
        <form>
    <div class = "form-group">
    <div class="form-group">
    
    </div>
    <label for="exampleInputEmail1">Nombre: </label>
    <input type="text" class="form-control" name="NombreC" id="NombreC" placeholder="Ingresa el nombre">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Teléfono: </label>
    <input type="text" class="form-control" name="TelefonoC" id="TelefonoC" placeholder="Ingresa el teléfono">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Correo: </label>
    <input type="text" class="form-control" name="CorreoC" id="CorreoC" placeholder="Ingresa el correo">
    </div>
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
    </div>
    </form>
        </div>
        
    </div>
    
</div>
<?php include("template/pie.php"); ?>