<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
    <script src="script.js"></script>
    <title>Registrar alumno</title>
</head>
<?php
$idTemp = $_POST['id'];
$nombreAdmin = $_POST['nombreAdmin'];
$apellidosAdmin = $_POST['apellidosAdmin'];
?>
<body>
    <header>
        <div class="avatar">
            <img src="https://cdn.icon-icons.com/icons2/2506/PNG/512/user_icon_150670.png" alt="Avatar">
            <span><?php echo $nombreAdmin." ".$apellidosAdmin; ?></span>
            <button class="boton2" onclick="redirigirALogin()">Cerrar sesión</button>
        </div>
    </header>
    <div class="container">
        <form class="login-form" method="POST" action="insertarAlumno.php">
            <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
            <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
            <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
            <h1>Registro de Alumno</h1>
            <h3>Ingrese los datos del alumno</h3>
            <div class="form-group">
                <label for="expediente">Expediente:</label>
                <input type="text" id="expediente" name="expediente" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required>
            </div>
            <div class="form-group">
                <label for="materia">Carrera:</label>
                <select id="materia" name="materia" class="lista-desplegable" >
                    <option value="Licenciatura en Informática">Licenciatura en Informática</option>
                    <option value="Licenciatura en Administración de las T.I.">Licenciatura en Administración de las T.I.</option>
                    <option value="Ingeniería de Software">Ingeniería de Software</option>
                    <option value="Ingeniería en Computación">Ingeniería en Computación</option>
                    <option value="Ingeniería en Telecomunicaciones y Redes">Ingeniería en Telecomunicaciones y Redes</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="text" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Registrar" class="boton" onclick="enviarFormulario2(event)">
            </div>
            <div class="form-group">
                <input type="reset" value="Borrar formulario" class="boton" onclick="borrarFormulario()">
            </div>
        </form>
        
    </div>
    <div id="CentrarBoton">
        <form class="formVolver" action="inicioAdmin.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
                <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
                <input type="submit" id="btnVolver" value="Volver">
            </div>
        </form>
    </div>
    <script>
        function redirigirALogin() {
            window.location.href = "../login/index.php";
        }
    </script>
</body>
</html>