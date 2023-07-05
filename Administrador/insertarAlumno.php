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
$materia = $_POST['materia'];
$contrasena = $_POST['contrasena'];
$rol = "Alumno";

$bd = new mysqli("localhost", "root", "", "proyectofinalalfas");

// Verificar si el expediente ya existe
$consulta = "SELECT expediente FROM usuarios WHERE expediente = ?";
$statement = $bd->prepare($consulta);
$statement->bind_param("i", $expediente);
$statement->execute();
$resultado = $statement->get_result();

if ($resultado->num_rows > 0) {
    // El expediente ya existe, mostrar mensaje de error
    ?>
    <body>
        <div class="popup" id="miPopup">
            <div class="popup-contenido">
                <h2>Error: El expediente ya existe en la base de datos.</h2>
                <form action="registrarAlumno.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                    <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
                    <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
                    <input type="submit" value="Volver">
                </form>
            </div>
        </div>
    </body>
    <?php
} else {
    // El expediente no existe, insertar el registro
    $query = "INSERT INTO usuarios (expediente, nombre, apellidos, contrasena, rol, carrera) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $bd->prepare($query);
    $statement->bind_param("isssss", $expediente, $nombre, $apellidos, $contrasena, $rol, $materia);
    $respuesta = $statement->execute();

    if ($respuesta) {
        ?>
        <body>
            <div class="popup" id="miPopup">
                <div class="popup-contenido">
                    <h2>Se agregó un nuevo registro</h2>
                    <form action="registrarAlumno.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
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
                    <h2>Error al agregar el registro. Por favor, inténtelo de nuevo.</h2>
                    <form action="registrarAlumno.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                        <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
                        <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
                        <input type="submit" value="Volver">
                    </form>
                </div>
            </div>
        </body>
        <?php 
    }
}

?>
