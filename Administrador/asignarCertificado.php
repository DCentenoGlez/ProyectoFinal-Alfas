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
    <div class="containerC">
        <form class="login-form" method="POST" action="insertarCertificado.php">
            <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
            <h1>Registro de Certificado</h1>
            <h3>Por favor, ingrese los siguientes datos:</h3><br>
            <div class="form-group">
                <label for="expediente">Expediente:</label>
                <input type="text" id="expediente" name="expediente" required>
            </div>
            <div class="form-group">
                <label for="certificado">Nombre del certificado:</label>
                <input type="text" id="certificado" name="certificado" required>
            </div>
            <div class="form-group">
                <label for="inicio">Fecha de inicio del curso:</label>
                <input type="date" id="inicio" name="inicio" required>
            </div>
            <div class="form-group">
                <label for="termino">Fecha de término del curso:</label>
                <input type="date" id="termino" name="termino" required>
            </div>
            
            <div class="form-group">
                <label>Habilidades:</label><br>
                <label for="programacion">
                    <input type="checkbox" id="programacion" name="skills[]" value="Programación">
                    Programación
                </label><br>
                <label for="desarrollo-web">
                    <input type="checkbox" id="desarrollo-web" name="skills[]" value="Desarrollo web">
                    Desarrollo web
                </label><br>
                <label for="diseno-grafico">
                    <input type="checkbox" id="diseno-grafico" name="skills[]" value="Diseño gráfico">
                    Diseño gráfico
                </label><br>
                <label for="base-datos">
                    <input type="checkbox" id="base-datos" name="skills[]" value="Bases de datos">
                    Bases de datos
                </label><br>
                <label for="gestion-proyectos">
                    <input type="checkbox" id="gestion-proyectos" name="skills[]" value="Gestión de proyectos">
                    Gestión de proyectos
                </label><br>
                <label for="analisis-datos">
                    <input type="checkbox" id="analisis-datos" name="skills[]" value="Análisis de datos">
                    Análisis de datos
                </label><br>
                <label for="marketing-digital">
                    <input type="checkbox" id="marketing-digital" name="skills[]" value="Marketing digital">
                    Marketing digital
                </label>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Registrar" class="boton" onclick="enviarFormulario(event)">
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