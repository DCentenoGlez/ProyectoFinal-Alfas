<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insertar alumno</title>
    </head>
    <style>
        /* Estilos CSS para el pop-up */
    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .popup-contenido {
        background-color: #fff;
        width: 300px;
        padding: 20px;
        border-radius: 5px;
    }

    .popup-contenido h2 {
        margin-top: 0;
    }

    .popup-contenido button {
        display: block;
        margin-top: 10px;
    }
    </style>
    <script>
        window.onload = function() {
        mostrarPopup();
    };

    function mostrarPopup() {
        document.getElementById("miPopup").style.display = "flex";
    }

    </script>
<?php 

$idTemp = $_POST['id'];
$nombreAdmin = $_POST['nombreAdmin'];
$apellidosAdmin = $_POST['apellidosAdmin'];

$expediente = $_POST['expediente'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$carrera = $_POST['carrera'];
$contrasena = $_POST['contrasena'];
$rol = "Alumno";

$bd = new mysqli("localhost", "root", "", "proyectofinalalfas");

$query = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', contrasena = '$contrasena', carrera = '$carrera' WHERE expediente = $expediente";
$respuesta = mysqli_query($bd,$query);

if ($respuesta) {
    ?>
    <body>
        <div class="popup" id="miPopup">
            <div class="popup-contenido">
                <h2>Se actualizó el registro del alumno</h2>
                <form action="detallesAlumno.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                    <input type="hidden" name="idAlumno" value="<?php echo $expediente; ?>">
                    <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
                    <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
                    <input type="submit" value="Volver">
                </form>
            </div>
        </div>
    </body>
    <?php
} else {
    ?>
    <body>
        <div class="popup" id="miPopup">
            <div class="popup-contenido">
                <h2>Error al actualizar el registro. Por favor, inténtelo de nuevo.</h2>
                <form action="detallesAlumno.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                    <input type="hidden" name="idAlumno" value="<?php echo $expediente; ?>">
                    <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
                    <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
                    <input type="submit" value="Volver">
                </form>
            </div>
        </div>
    </body>
    <?php 
}

?>
