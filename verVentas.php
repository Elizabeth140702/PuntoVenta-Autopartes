<?php include("template/cabecera.php"); 
// AQUI DEBEMOS DE INCLUIR LA BASE DE DATOS PARA PODER ACCEDER A ELLA
include("./configuracion/bd.php");

$idVenta=(isset($_POST['idVenta']))?$_POST['idVenta']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
    case "borrar":
        $sentenciaSQL=$conexion->prepare("DELETE FROM ventas WHERE idVenta=:idVenta");
        $sentenciaSQL->bindParam(':idVenta',$idVenta);
        $sentenciaSQL->execute();
        // Mostrar ventana emergente al agregar exitosamente
        echo '<script>alert("Venta eliminada exitosamente");</script>';
        break;
    }
//SENTENCIA PARA MOSTRAR TODOS LOS DATOS
$sentenciaSQL=$conexion->prepare("SELECT * FROM ventas");
$sentenciaSQL->execute();   //EJECUTAR LA SENTENCIA
$listaVentas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 
?>

<div class="col-md-12">
<div class="card">
        <div class="card-header">
            VENTAS REALIZADAS
        </div>
        <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID VENTA </th>
                <th>NOMBRE CLIENTE</th>
                <th>NOMBRE PRODUCTO</th>
                <th>PRECIO</th>
                <th>OPCIÓN</th>
            </tr>
        </thead>

        <tbody>
            <!-- AQUI SE DEBE USAR UN FOR PARA MOSTRAR TODOS LOS DATOS DE TODAS LAS VENTAS-->
            <?php foreach($listaVentas as $ventas){ ?>
                    <tr>
                        <td><?php echo $ventas['idVenta']; ?></td>
                        <td><?php echo $ventas['NombreC']; ?></td>
                        <td><?php echo $ventas['NombreP']; ?></td>
                        <td><?php echo $ventas['Precio']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <form method="post">

                                    <input type="hidden" name="idVenta" id="idVenta" value="<?php echo $ventas['idVenta']; ?>">                   
                                    <button type="submit" name="accion" value="borrar" class="btn-danger">Borrar</button>

                                </form>
                                </div>
                            <td>
                    </tr>
            <?php }?>
            
        </tbody>
    </table>
</div>
</div>

<?php include("template/pie.php"); ?>