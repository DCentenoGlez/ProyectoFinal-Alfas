<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <div class="container">
        <form class="login-form" method="POST" action="validarContra.php">
            <h1>Bienvenido</h1>
            <h3>Ingrese sus datos para comenzar</h3>
            <div class="form-group">
                <label for="email">Expediente: :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="pass" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Iniciar sesión">
            </div>
        </form>
        <div class="caja" id="caja">
        <form method="POST" action="validarContra.php">
            <h3>Correo:</h3><input type="text" name="email" id = "email" >
            <h3>Contraseña:</h3><input type="password" name="pass" id = "pass" >
            
            <br>
            <br>
            <br>
            <input type="submit" value = "Iniciar Sesión" class="boton"/>
        </form>
        
    <form method="POST" action="recuperar.php">
        <input type="submit" value="Recuperar mi contraseña">
    </form>
    </div>
</body>
</html>