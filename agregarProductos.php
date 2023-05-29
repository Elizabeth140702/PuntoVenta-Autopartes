<?php include("template/cabecera.php"); ?>
<?php
$NombreP=(isset($_POST['NombreP']))?$_POST['NombreP']:"";
$Modelo=(isset($_POST['Modelo']))?$_POST['Modelo']:"";
$Precio=(isset($_POST['Precio']))?$_POST['Precio']:"";
$Existencias=(isset($_POST['Existencias']))?$_POST['Existencias']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("configuracion/bd.php");

switch($accion){
    case "agregar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO productos (NombreP, Modelo, Precio, Existencias) VALUES (:NombreP, :Modelo, :Precio, :Existencias);");
        $sentenciaSQL->bindParam(':NombreP', $NombreP);
        $sentenciaSQL->bindParam(':Modelo', $Modelo);
        $sentenciaSQL->bindParam(':Precio', $Precio);
        $sentenciaSQL->bindParam(':Existencias', $Existencias);
        $sentenciaSQL->execute();
         // Mostrar ventana emergente al agregar exitosamente
         echo '<script>alert("Producto agregado exitosamente");</script>';
         break;
}
?>
<div class="col-md-7">
<form method= "POST" enctype="multipart/form-data">

    <div class="card">
        <div class="card-header">
            AGREGAR PRODUCTOS
        </div>
        <div class="card-body">
        <form>
    <div class = "form-group">
    <div class="form-group">
    
    </div>
    <label >Nombre: </label>
    <input type="text" class="form-control" name="NombreP" id="NombreP" placeholder="Ingresa el nombre">
    </div>
    <div class="form-group">
    <label >Modelo: </label>
    <input type="text" class="form-control" name="Modelo" id="Modelo" placeholder="Ingresa el modelo">
    </div>
    <div class="form-group">
    <label >Precio: </label>
    <input type="text" class="form-control" name="Precio" id="Precio" placeholder="Ingresa el precio">
    </div>
    <div class="form-group">
    <label >Existencias: </label>
    <input type="text" class="form-control" name="Existencias" id="Existencias" placeholder="Ingresa las existencias">
    </div>
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
    </div>
    </form>
        </div>
        
    </div>
    
</div>
<?php include("template/pie.php"); ?>