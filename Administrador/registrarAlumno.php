<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
    <script src="script.js"></script>
</head>
<?php
$idTemp = $_POST['id'];
?>
<body>
    <div class="container">
        <form class="login-form" method="POST" action="insertarAlumno.php">
            <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
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
                    <option value="opcion1">Licenciatura en Informática</option>
                    <option value="opcion2">Licenciatura en Administración de las T.I.</option>
                    <option value="opcion3">Ingeniería de Software</option>
                    <option value="opcion4">Ingeniería en Computación</option>
                    <option value="opcion5">Ingeniería en Telecomunicaciones y Redes</option>
                </select>
            </div><br>
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
                <input type="submit" id="btnVolver" value="Volver">
            </div>
        </form>
    </div>

</body>
</html>