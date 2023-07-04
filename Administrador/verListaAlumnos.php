<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de alumnos</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <?php
        $id = $_POST['id'];
        $bd = new mysqli("localhost","root","","proyectofinalalfas");
        $querry="SELECT * FROM usuarios WHERE carrera IS NOT NULL";
        $respuesta = mysqli_query($bd,$querry);
    ?>
    <div class="containerC">
        <div class="centrar">
            <table class="listaAlumnos">
                <thead>
                    <tr>
                        <th>Expediente</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
<?php
    while($datos = mysqli_fetch_array($respuesta)){  
?> 
                <tbody>
                    <tr>
                        <td><?php echo $datos['expediente']?> </td>
                        <td><?php echo $datos['nombre']?> </td>
                        <td><?php echo $datos['apellidos']?> </td>
                        <td><?php echo $datos['carrera']?> </td>
                        <td>
                            <form method="POST" action="detallesAlumno.php"> 
                                <input type="hidden" name="id" value="<?php echo $datos['expediente']; ?>">
                                <input class="boton" type="submit" value="Detalles">
                            </form>
                        </td>
                    </tr>
                </tbody>
<?php
    }
?>
            </table>
            <div id="CentrarBoton">
                <form class="formVolver" action="inicioAdmin.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $idTemp; ?>">
                        <input type="submit" id="btnVolver" value="Volver">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>