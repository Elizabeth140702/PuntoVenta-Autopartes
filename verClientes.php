<?php include("template/cabecera.php"); 

// AQUI DEBEMOS DE INCLUIR LA BASE DE DATOS PARA PODER ACCEDER A ELLA
include("./configuracion/bd.php");

$idCliente=(isset($_POST['idCliente']))?$_POST['idCliente']:"";//       PONER LAS VARIABLES EN TORNO A QUE SE VA A ELIMINAR
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


switch($accion){
    case "borrar"://        DEPENDIENDO DEL BOTON
        $sentenciaSQL=$conexion->prepare("DELETE FROM clientes WHERE idCliente=:idCliente");
        $sentenciaSQL->bindParam(':idCliente',$idCliente);
        $sentenciaSQL->execute();
         // Mostrar ventana emergente al agregar exitosamente
        echo '<script>alert("Cliente eliminado exitosamente");</script>';
        break;
}

//SENTENCIA PARA MOSTRAR TODOS LOS DATOS
$sentenciaSQL=$conexion->prepare("SELECT * FROM clientes");
$sentenciaSQL->execute();   //EJECUTAR LA SENTENCIA
$listaClientes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 

?>

<div class="col-md-12">
<div class="card">
        <div class="card-header">
            CLIENTES REGISTRADOS
        </div>
        <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID </th>
                <th>NOMBRE</th>
                <th>TELEFONO</th>
                <th>CORREO</th>
                <th>OPCIÓN</th>
            </tr>
        </thead>
        <tbody>
            <!-- AQUI SE DEBE USAR UN FOR PARA MOSTRAR TODOS LOS DATOS DE TODSOS LOS CLIENTES -->
            <?php foreach($listaClientes as $clientes){ ?>
                    <tr>
                        <td><?php echo $clientes['idCliente']; ?></td>
                        <td><?php echo $clientes['NombreC']; ?></td>
                        <td><?php echo $clientes['TelefonoC']; ?></td>
                        <td><?php echo $clientes['CorreoC']; ?></td>


                        <td>
                            <div class="btn-group" role="group" aria-label="">
                            <form method="post">

                                <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $clientes['idCliente']; ?>">                   
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

<!-- PIE DE PAGINA -->
<?php include("template/pie.php"); ?>
