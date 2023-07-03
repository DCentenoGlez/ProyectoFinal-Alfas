function realizarAccion() {
    var accion = document.getElementById("accion").value;
  
    switch (accion) {
      case "opcion1":
        window.location.href = "Asignar_certificado.html";
        break;
      case "opcion2":
        window.location.href = "Registrar_alumno.html";
        break;
      case "opcion3":
        window.location.href = "Lista_alumnos.html";
        break;
      default:
        console.log("Acción no válida");
        break;
    }
  }

  function cerrarSesion() {
    // Eliminar el indicador de sesión iniciada del LocalStorage
    localStorage.removeItem('sesionIniciada');
    // Redireccionar a la página de inicio de sesión
    window.location.href = 'Inicio_sesion.html';
  }

  // Este envio de formulario es para Asignar certificado
  function enviarFormulario(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    // Validar el formulario antes de enviarlo
    if (validarFormulario()) {
        console.log("Enviando formulario");
        window.location.href = "Menu_administrador.html";
        window.alert("Se enviaron los datos correctamente");
    } else {
        window.alert("No se pudo enviar el formulario porque no había información para registrar.");
    }
}

// Este envio de formulario es para Registrar alumno
function enviarFormulario2(event) {
  event.preventDefault(); // Evitar el envío del formulario por defecto

  // Validar el formulario antes de enviarlo
  if (validarFormulario2()) {
      console.log("Enviando formulario");
      window.location.href = "Menu_administrador.html";
      window.alert("Se enviaron los datos correctamente");
  } else {
      window.alert("No se pudo enviar el formulario porque no había información para registrar.");
  }
}

  function borrarFormulario() {
    document.getElementById("expediente").value = "";
    document.getElementById("nombre").value = "";
    document.getElementById("apellidos").value = "";
    document.getElementById("materia").selectedIndex = 0;
  }

// Validacion para Asignar certificado
  function validarFormulario() {
    var expediente = document.getElementById("expediente").value;
    var certificado = document.getElementById("certificado").value;
    var inicio = document.getElementById("inicio").value;
    var termino = document.getElementById("termino").value;

    // Verificar que los campos requeridos no estén vacíos
    if (expediente === "" || certificado === "" || inicio === "" || termino === "") {
        alert("Por favor, complete todos los campos requeridos.");
        return false; 
    }

    return true; 
}

//Validacion para Registrar alumno
function validarFormulario2() {
  var expediente = document.getElementById("expediente").value;
  var nombre = document.getElementById("nombre").value;
  var apellidos = document.getElementById("apellidos").value;
  var materia = document.getElementById("materia").value;

  // Verificar que los campos requeridos no estén vacíos
  if (expediente === "" || nombre === "" || apellidos === "" || materia === "") {
      alert("Por favor, complete todos los campos requeridos.");
      return false;
  }

  return true;
}


  function redireccionar(url) {
    window.location.href = url;
}
  