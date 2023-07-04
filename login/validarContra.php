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

$bd = new mysqli("localhost", "root", "", "proyectofinalalfas");

if ($bd){
    echo "se establece conexion";

}
else{
    echo "hay un error";
}

$query = "SELECT expediente,rol FROM usuarios WHERE contrasena = '$var3' AND expediente = '$var4'";



//se guarda el resultado de la consulta
$resultado = mysqli_query($bd, $query);
$cons = ($resultado && mysqli_num_rows($resultado));

//se analiza el resultado y si es que esta devolvio algun resultado
if (($resultado && mysqli_num_rows($resultado))> 0){
    $row = mysqli_fetch_assoc($resultado);
    $expediente = $row['expediente'];
    $rol = $row['rol'];

    if($rol=='Administrador'){
    ?>
        <form id="redirectForm1" action="../Administrador/inicioAdmin.php" method="POST">
            <input type="hidden" name="id" value=<?php echo $expediente ?>>
        </form>
        <script type="text/javascript">
            document.getElementById("redirectForm1").submit();
        </script>
    <?php
    }
    elseif($rol=='Alumno'){
        ?>
            <form id="redirectForm3" action="../Alumno/inicioAlumno.php" method="POST">
                <input type="hidden" name="id" value=<?php echo $expediente ?>>
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