<!--    CON ESTAS INSTRUCCIONES HACEMOS EL LOG OUT -->
<?php
session_start();
session_destroy();
header("location:./index.php");//   UNA VEZ PULSADO CERRAR REDIRECCIONAMOS AL LOG IN
?>