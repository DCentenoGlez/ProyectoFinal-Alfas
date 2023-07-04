<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insertar certificado</title>
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
$idAlumno = $_POST['expediente'];
$nombreCertificado = $_POST['certificado'];
$fechaInicio = $_POST['inicio'];
$fechaFin = $_POST['termino'];
$habilidades = $_POST['skills'];

// Verificar la existencia del ID de alumno en la tabla usuarios
$bd = new mysqli("localhost", "root", "", "proyectofinalalfas");
$consulta = "SELECT COUNT(*) FROM usuarios WHERE expediente = ?";
$statement = $bd->prepare($consulta);
$statement->bind_param("i", $idAlumno);
$statement->execute();
$statement->bind_result($count);
$statement->fetch();
$statement->close();

if ($count > 0) {
    // El ID de alumno existe, proceder con la inserción del certificado
    if (empty($habilidades)) {
        // No se seleccionó ninguna habilidad
        ?>
        <body>
            <div class="popup" id="miPopup">
                <div class="popup-contenido">
                    <h2>Error: No se seleccionó ninguna habilidad.</h2>
                    <form action="asignarCertificado.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                        <input type="submit" value="Volver">
                    </form>
                </div>
            </div>
        </body>
        <?php
    } else {
        $habilidadesStr = implode(", ", $habilidades);
        
        $query = "INSERT INTO certificados (nombre, fechaInicio, fechaFin, habilidades, idAlumno) VALUES (?, ?, ?, ?, ?)";
        $statement = $bd->prepare($query);
        $statement->bind_param("ssssi", $nombreCertificado, $fechaInicio, $fechaFin, $habilidadesStr, $idAlumno);
        $respuesta = $statement->execute();
        $statement->close();
        
        if ($respuesta) {
            ?>
            <body>
                <div class="popup" id="miPopup">
                    <div class="popup-contenido">
                        <h2>Se agregó un nuevo certificado.</h2>
                        <form action="asignarCertificado.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
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
                        <h2>Error al insertar el certificado. Por favor, inténtelo de nuevo.</h2>
                        <form action="asignarCertificado.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                            <input type="submit" value="Volver">
                        </form>
                    </div>
                </div>
            </body>
            <?php
        }
    }
} else {
    // El ID de alumno no existe, mostrar mensaje de error
    ?>
    <body>
        <div class="popup" id="miPopup">
            <div class="popup-contenido">
                <h2>Error: El ID de alumno no existe.</h2>
                <form action="asignarCertificado.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                    <input type="submit" value="Volver">
                </form>
            </div>
        </div>
    </body>
    <?php
}
?>
