<!-- CABECERA -->
<?php include("template/cabecera.php"); ?>

<?php
$NombreC=(isset($_POST['NombreC']))?$_POST['NombreC']:"";
$NombreP=(isset($_POST['NombreP']))?$_POST['NombreP']:"";
$Precio=(isset($_POST['Precio']))?$_POST['Precio']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

//      INCLUIR LA BASE DE DATOS
include("configuracion/bd.php");

//      REACCIONAR A LOS DIFERENTES EVENTOS
switch($accion){
    case "agregar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO ventas ( NombreC, NombreP, Precio) VALUES (:NombreC, :NombreP, :Precio);");
        $sentenciaSQL->bindParam(':NombreC', $NombreC);
        $sentenciaSQL->bindParam(':NombreP', $NombreP);
        $sentenciaSQL->bindParam(':Precio', $Precio);
        $sentenciaSQL->execute();
         // Mostrar ventana emergente al agregar exitosamente
         echo '<script>alert("Venta agregada exitosamente");</script>';
         break;
}
?>
<div class="col-md-7">
<form method= "POST" enctype="multipart/form-data">

    <div class="card">
        <div class="card-header">
            AGREGAR VENTA
        </div>
        <div class="card-body">
          <form>
    <div class = "form-group">
    <div class="form-group">
    </div>
    <label >Nombre Cliente: </label>
    <input type="text" class="form-control" name="NombreC" id="NombreC" placeholder="Ingresa el nombre del cliente">
    </div>
    <label >Nombre Producto: </label>
    <input type="text" class="form-control" name="NombreP" id="NombreP" placeholder="Ingresa el nombre del producto">
    </div>
    <label >Precio: </label>
    <input type="text" class="form-control" name="Precio" id="Precio" placeholder="Ingresa el precio">
    </div>
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
        </div>
        </div>
    </form>
        </div>

<!--        PIE DE LA PAGINA -->
<?php include("template/pie.php"); ?>