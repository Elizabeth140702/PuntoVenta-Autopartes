<!-- INCLUSION DE LAS CABECERAS -->
<?php include("template/cabecera.php"); 

// AQUI DEBEMOS DE INCLUIR LA BASE DE DATOS PARA PODER ACCEDER A ELLA
include("./configuracion/bd.php");


$idEmpleado=(isset($_POST['idEmpleado']))?$_POST['idEmpleado']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
    case "borrar":
        $sentenciaSQL=$conexion->prepare("DELETE FROM empleados WHERE idEmpleado=:idEmpleado");
        $sentenciaSQL->bindParam(':idEmpleado',$idEmpleado);
        $sentenciaSQL->execute();
        // Mostrar ventana emergente al agregar exitosamente
        echo '<script>alert("Empleado eliminado exitosamente");</script>';
        break;
    }
//      ORDEN DE PRIORIDAD
$sentenciaSQL=$conexion->prepare("SELECT * FROM empleados");
$sentenciaSQL->execute();   //EJECUTAR LA SENTENCIA
$listaEmpleados=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            EMPLEADOS REGISTRADOS
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>NOMBRE</th>
                        <th>TELÉFONO</th>
                        <th>CORREO</th>
                        <th>OPCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <!-- AQUI SE DEBE USAR UN FOR PARA MOSTRAR TODOS LOS DATOS DE TODSOS LOS EMPLEADOS -->
                    <?php foreach($listaEmpleados as $empleados){ ?>
                        <tr>
                        
                            <td><?php echo $empleados['idEmpleado']; ?></td>
                            <td><?php echo $empleados['NombreE']; ?></td>
                            <td><?php echo $empleados['TelefonoE']; ?></td>
                            <td><?php echo $empleados['CorreoE']; ?></td>

                            <td>
                                <div class="btn-group" role="group" aria-label="">
                                <form method="post">

                                    <input type="hidden" name="idEmpleado" id="idEmpleado" value="<?php echo $empleados['idEmpleado']; ?>">                   
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
