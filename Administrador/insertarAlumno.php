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

$expediente = $_POST['expediente'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$materia = $_POST['materia'];
$contrasena = $_POST['contrasena'];
$rol = "Alumno";

$bd = new mysqli("localhost", "root", "", "proyectofinalalfas");

$query = "INSERT INTO proyectofinalalfas (expediente, nombre, apellidos, constrasena, rol, carrera) VALUES ('$expediente', '$nombre', $apellidos, $rol, '$materia')";
$respuesta = mysqli_query($bd,$query);
if ($respuesta) {
    ?>
<!-- Titulo, Tipo, Tamaño, Precio, Ubicacion, Fotografia, FotografiaUbicacion, DescripcionGeneral, Caracteristicas, Estatus, Habitaciones -->
    <body>
        <div class="popup" id="miPopup">
            <div class="popup-contenido">
                <h2>Se agrego un nuevo registro  </h2>
                <form action="registrarAlumno.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                    <input type="submit" value="Volver">
                </form>
            </div>
        </div>
    </body>
    <?php
} else{
    ?>
    <body>
        <div class="popup" id="miPopup">
            <div class="popup-contenido">
                <h2>Error al agregar el registro. Por favor intente de nuevo.</h2>
                <form action="registrarAlumno.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                    <input type="submit" value="Volver">
                </form>
            </div>
        </div>
    </body>
    <?php 
}

?>