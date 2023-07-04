<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>
<?php
        $id = $_POST['id'];
        $bd = new mysqli("localhost","root","","proyectofinalalfas");
        $querry="SELECT * FROM usuarios WHERE expediente = $id";
        $respuesta = mysqli_query($bd,$querry);
        $datos = mysqli_fetch_array($respuesta);

        //$querry2="SELECT * FROM certificados WHERE idAlumno = $id";
        //$respuesta2 = mysqli_query($bd,$querry2);
?>
<script>
    if(<?php echo $datos['rol']?> == "Alumno"){
        
    }
</script>
<body>
    <div class="containerC">
        <div class="contenedor-detalles2">
        <form class="contenedor-detalles" action="Detalles_alumno2.html" method="post">
            <div class="centrar">
                <h1>Detalles del alumno</h1><br><br>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $datos['nombre']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $datos['apellidos']?>"readonly>
                </div>
                <div class="form-group">
                    <label for="expediente">Expediente:</label>
                    <input type="text" id="expediente" name="expediente" value="<?php echo $datos['expediente']?>"readonly>
                </div>
                <div class="form-group">
                    <label for="carrera">Carrera:</label>
                    <input type="text" id="carrera" name="carrera" value="<?php echo $datos['carrera']?>" readonly>
                </div>
            </div>           
            <table class="listaAlumnos">
                <thead>
                    <tr>
                        <th>Certificado</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de término</th>
                        <th>Descripción</th>
                        <th>Skills</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Django</td>
                        <td>Agosto 1 del 2022</td>
                        <td>Diciembre 1 del 2022</td>
                        <td>Framework para Backend</td>
                        <td>Crear aplicaciones desde cero</td>
                    </tr>
                    <tr>
                        <td>Scrum</td>
                        <td>Agosto 1 del 2021</td>
                        <td>Diciembre 1 del 2021</td>
                        <td>Métodología de trabajo</td>
                        <td>Liderazgo</td>
                    </tr>
                    <tr>
                        <td>Aplicaciones Serverless</td>
                        <td>Febrero 1 del 2022</td>
                        <td>Junio 7 del 2022</td>
                        <td>Aplicaciones sin necesidad de server</td>
                        <td>Saber un poco de todo</td>
                    </tr>

                    </tr>
                </tbody>
                
            </table>
        </form>
        <div id="CentrarBoton">
            <form class="formVolver" action="verListaAlumnos.php" method="POST">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" id="btnVolver" value="Volver">
                </div>
            </form>
        </div>
        </div>
    </div>

    <script>
        function redireccionar(url) {
            window.location.href = url;
        }
    </script>
    
</body>
</html>