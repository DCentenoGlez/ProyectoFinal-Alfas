<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
    <script src="validacion.js"></script>
</head>
<?php
$id = $_POST['id'];

$bd = new mysqli("localhost", "root", "", "proyectofinalalfas");

$consulta = "SELECT nombre, apellidos FROM usuarios WHERE expediente = '$id'";
$respuesta = mysqli_query($bd,$consulta);
$fila = mysqli_fetch_array($respuesta);
$nombreAdmin = $fila['nombre'];
$apellidosAdmin = $fila['apellidos'];


?>
<body>
    <header>
        <div class="avatar">
            <img src="https://cdn.icon-icons.com/icons2/2506/PNG/512/user_icon_150670.png" alt="Avatar">
            <span><?php echo $nombreAdmin." ".$apellidosAdmin; ?></span>
            <button class="boton2" onclick="redirigirALogin()">Cerrar sesión</button>
        </div>
    </header>
    <main class="container">
        <div class="login-form">
            <h1>Bienvenido, <?php echo $nombreAdmin ?></h1>
            <br><br><br>
            <h3>Elija la accion que desee realizar</h3>
            <div class="botones">
                <div>
                    <form method="POST" action="asignarCertificado.php">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
                        <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
                        <input class="boton" type="submit" value="Asignar Certificado">
                    </form>
                    <br>
                </div>
                <div>
                    <form method="POST" action="registrarAlumno.php">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
                        <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
                        <input class="boton" type="submit" value="Registrar Alumno">
                    </form>
                    <br>
                </div>
                <div>
                    <form method="POST" action="verListaAlumnos.php">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
                        <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
                        <input class="boton" type="submit" value="Lista de Alumnos">
                    </form>
                </div>
            </div>
        </div>

    </main>
    <script>
        function redirigirALogin() {
            window.location.href = "../login/index.php";
        }
    </script>
</body>
</html>