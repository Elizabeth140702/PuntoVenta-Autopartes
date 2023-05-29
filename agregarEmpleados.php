<?php include("template/cabecera.php"); ?>

<?php
$NombreE=(isset($_POST['NombreE']))?$_POST['NombreE']:"";
$TelefonoE=(isset($_POST['TelefonoE']))?$_POST['TelefonoE']:"";
$CorreoE=(isset($_POST['CorreoE']))?$_POST['CorreoE']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("configuracion/bd.php");

switch($accion){
    case "agregar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO empleados (NombreE, TelefonoE, CorreoE) VALUES (:NombreE, :TelefonoE, :CorreoE);");
        $sentenciaSQL->bindParam(':NombreE', $NombreE);
        $sentenciaSQL->bindParam(':TelefonoE', $TelefonoE);
        $sentenciaSQL->bindParam(':CorreoE', $CorreoE);
        $sentenciaSQL->execute();
        // Mostrar ventana emergente al agregar exitosamente
        echo '<script>alert("Empleado agregado exitosamente");</script>';
        break;
}
?>

<div class="col-md-7">
<form method= "POST" enctype="multipart/form-data">

    <div class="card">
        <div class="card-header">
            AGREGAR EMPLEADOS
        </div>
        <div class="card-body">
        <form>
    <div class = "form-group">
    <div class="form-group">
    </div>
    <label for="exampleInputEmail1">Nombre: </label>
    <input type="text" class="form-control" name="NombreE" id="NombreE" placeholder="Ingresa el nombre">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Teléfono: </label>
    <input type="text" class="form-control" name="TelefonoE" id="TelefonoE" placeholder="Ingresa el teléfono">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Correo: </label>
    <input type="text" class="form-control" name="CorreoE" id="CorreoE" placeholder="Ingresa el correo">
    </div>
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
    </div>
    </form>
        </div>
        
    </div>
    
</div>
<?php include("template/pie.php"); ?>