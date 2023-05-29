<!-- INCLUSION DE LA CABECERA -->
<?php include("template/cabecera.php");

// AQUI DEBEMOS DE INCLUIR LA BASE DE DATOS PARA PODER ACCEDER A ELLA
include("./configuracion/bd.php");


$idProducto=(isset($_POST['idProducto']))?$_POST['idProducto']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
    case "borrar":
        $sentenciaSQL=$conexion->prepare("DELETE FROM productos WHERE idProducto=:idProducto");
        $sentenciaSQL->bindParam(':idProducto',$idProducto);
        $sentenciaSQL->execute();
        // Mostrar ventana emergente al agregar exitosamente
        echo '<script>alert("Producto eliminado exitosamente");</script>';
        break;
    }
//SENTENCIA PARA MOSTRAR TODOS LOS DATOS
$sentenciaSQL=$conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();   //EJECUTAR LA SENTENCIA
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 
?>

<div class="col-md-12">
<div class="card">
        <div class="card-header">
            PRODUCTOS REGISTRADOS
        </div>
        <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID </th>
                <th>NOMBRE</th>
                <th>MODELO</th>
                <th>PRECIO</th>
                <th>EXISTENCIAS</th>
                <th>OPCIÓN</th>
            </tr>
        </thead>
        <tbody>

            <!-- AQUI SE DEBE USAR UN FOR PARA MOSTRAR TODOS LOS DATOS DE TODOS LOS PRODUCTOS -->
            <?php foreach($listaProductos as $productos){ ?>
                    <tr>
                        <td><?php echo $productos['idProducto']; ?></td>
                        <td><?php echo $productos['NombreP']; ?></td>
                        <td><?php echo $productos['Modelo']; ?></td>
                        <td><?php echo $productos['Precio']; ?></td>
                        <td><?php echo $productos['Existencias']; ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                            <form method="post">

                                <input type="hidden" name="idProducto" id="idProducto" value="<?php echo $productos['idProducto']; ?>">                   
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