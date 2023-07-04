<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>
<?php
        $id = $_POST['idAlumno'];
        $bd = new mysqli("localhost","root","","proyectofinalalfas");
        $querry="SELECT * FROM usuarios WHERE expediente = $id";
        $respuesta = mysqli_query($bd,$querry);
        $datos = mysqli_fetch_array($respuesta);

        //Ver si existen los datos en POST
            //SI:
        if (!empty($_POST['nombreAdmin']) && !empty($_POST['apellidosAdmin']) && !empty($_POST['id'])) {
            $idTemp = $_POST['id']; // id del administrador
            $nombreAdmin = $_POST['nombreAdmin'];
            $apellidosAdmin = $_POST['apellidosAdmin'];
            $condicional = 1;

        } else {  
            $nombreAdmin = $datos['nombre'];
            $apellidosAdmin = $datos['apellidos'];
            $condicional = 0;
        }

        // NO: (loggeo un alumno)
            //Usar su ID para obtener su nombre y apellidos
            //Guardarlos en nombreAdmin y apellidoAdmin

        $querry2="SELECT * FROM certificados WHERE idAlumno = $id";
        $respuesta2 = mysqli_query($bd,$querry2);
?>
<script>

    function ocultarAlumnos(){
        if(<?php echo $condicional?> === 0) {
            var boton = document.getElementById("btnVolver");
            boton.style.display = "none"; 
            
            var botonEditar = document.getElementById("btnEditar");
            botonEditar.style.display = "none"; 
            
            var entradas = document.getElementsByClassName("btnAdmin");
            for (var i = 0; i < entradas.length; i++) {
                entradas[i].disabled = true;
            }
        }

        document.body.style.display = "block";
    }

</script>
<body style="display: none;" onload="ocultarAlumnos()">
    <header>
        <div class="avatar">
            <img src="https://cdn.icon-icons.com/icons2/2506/PNG/512/user_icon_150670.png" alt="Avatar">
            <span><?php echo $nombreAdmin." ".$apellidosAdmin; ?></span>
            <button class="boton2" onclick="redirigirALogin()">Cerrar sesión</button>
        </div>
    </header>
    <div class="containerC">
        <div class="contenedor-detalles2">
        <form class="contenedor-detalles" action="Detalles_alumno2.html" method="post">
            <div class="centrar">
                <h1>Detalles del alumno</h1><br><br>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input class="btnAdmin" type="text" id="nombre" name="nombre" value="<?php echo $datos['nombre']?>">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input class="btnAdmin" type="text" id="apellidos" name="apellidos" value="<?php echo $datos['apellidos']?>">
                </div>
                <div class="form-group">
                    <label for="expediente">Expediente:</label>
                    <input class="btnAdmin" type="text" id="expediente" name="expediente" value="<?php echo $datos['expediente']?>">
                </div>
                <div class="form-group">
                    <label for="carrera">Carrera:</label>
                    <input class="btnAdmin" type="text" id="carrera" name="carrera" value="<?php echo $datos['carrera']?>" >
                </div>
              <input class="btnEditar" id="btnEditar" type="submit" value="Editar">
            </div>           
            <table class="listaAlumnos">
                <thead>
                    <tr>
                        <th>Certificado</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de término</th>
                        <th>Habilidades</th>
                
                    </tr>
                </thead>
                <?php while($datos2 = mysqli_fetch_array($respuesta2)){ ?>
                <tbody>
                    <tr>
                        <td><?php echo $datos2['nombre']?></td>
                        <td><?php echo $datos2['fechaInicio']?></td>
                        <td><?php echo $datos2['fechaFin']?></td>
                        <td><?php echo $datos2['habilidades']?></td>
                       
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </form>
    </div>
</div>
<div id="CentrarBoton">
    <form class="formVolver" action="verListaAlumnos.php" method="POST">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $idTemp ?>">
            <input type="hidden" name="nombreAdmin" value="<?php echo $nombreAdmin ?>">
            <input type="hidden" name="apellidosAdmin" value="<?php echo $apellidosAdmin ?>">
            <input type="submit" id="btnVolver" value="Volver">
        </div>
    </form>
</div>

    <script>
        function redireccionar(url) {
            window.location.href = url;
        }
        function redirigirALogin() {
            window.location.href = "../login/index.php";
        }
    </script>
</body>
</html>