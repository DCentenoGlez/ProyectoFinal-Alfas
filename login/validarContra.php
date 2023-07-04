<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Contraseña</title>
    <link rel="stylesheet" href="popUpStyle.css">
</head>

<?php
$var2 = "";
$var3 = $_POST['pass'];
$var4 = $_POST['email'];

$bd = new mysqli("localhost", "root", "", "inmobiliaria");

if ($bd){
    echo "se establece conexion";

}
else{
    echo "hay un error";
}

$query = "SELECT IdEmpleados,Rol FROM empleados WHERE contraseña = '$var3' AND Correo = '$var4'";
//$query2 = "SELECT Correo FROM empleados WHERE Correo = '$var4'";


//se guarda el resultado de la consulta
//$resultado2 = mysqli_query($bd, $query2);
$resultado = mysqli_query($bd, $query);
$cons = ($resultado && mysqli_num_rows($resultado));
//$cons2 = ($resultado2 && mysqli_num_rows($resultado2));

//se analiza el resultado y si es que esta devolvio algun resultado
if (($resultado && mysqli_num_rows($resultado))> 0){
    $row = mysqli_fetch_assoc($resultado);
    $idEmpleado = $row['IdEmpleados'];
    $rol = $row['Rol'];

    if($rol=='Agente de finanzas'){
    ?>
        <form id="redirectForm1" action="../agenteFinanzas/gestionComision.php" method="post">
            <input type="hidden" name="id" value=<?php echo $idEmpleado ?>>
        </form>
        <script type="text/javascript">
            document.getElementById("redirectForm1").submit();
        </script>
    <?php
    }
    elseif($rol=='Agente de ventas'){
        ?>
            <form id="redirectForm2" action="../agenteVentas/inicioVentas.php" method="post">
                <input type="hidden" name="id" value=<?php echo $idEmpleado ?>>
            </form>
            <script type="text/javascript">
                document.getElementById("redirectForm2").submit();
            </script>
        <?php
        }
    elseif($rol=='Gerente de ventas'){
        ?>
            <form id="redirectForm3" action="../gerenteVentas/menuGerenteVentas.php" method="post">
                <input type="hidden" name="id" value=<?php echo $idEmpleado ?>>
            </form>
            <script type="text/javascript">
                document.getElementById("redirectForm3").submit();
            </script>
        <?php
        }
    exit;
}
else{
    ?>
    <body>
        <div class="popup" id="miPopup">
            <div class="popup-contenido">
                <h2>Informacion incorrecta, revise los datos</h2>
                <form action="logIn.php">
                    <button class="btnCerrar" type="submit">Cerrar</button>
                </form> 
            </div>
        </div>
    </body>
    <?php
    echo "\n informacion incorrecta, revisa los datos \n";
}
mysqli_close($bd);

?>