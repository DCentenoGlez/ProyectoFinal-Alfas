function realizarAccion() {
    var accion = document.getElementById("accion").value;
  
    switch (accion) {
      case "opcion1":
        // Redireccionar al archivo HTML para asignar certificado
        window.location.href = "Asignar_certificado.html";
        break;
      case "opcion2":
        // Redireccionar al archivo HTML para registrar alumno
        window.location.href = "Registrar_alumno.html";
        break;
      case "opcion3":
        // Redireccionar al archivo HTML para ver lista de alumnos
        window.location.href = "Lista_alumnos.html";
        break;
      default:
        // Acción por defecto si no se selecciona ninguna opción válida
        console.log("Acción no válida");
        break;
    }
  }

  function enviarFormulario(event) {
    console.log("Enviando formulario")
    event.preventDefault(); // Evitar el envío del formulario por defecto
    window.location.href = "Menu_administrador.html";
    window.alert("Se enviaron los datos correctamente");
  }

  function borrarFormulario() {
    document.getElementById("expediente").value = "";
    document.getElementById("nombre").value = "";
    document.getElementById("apellidos").value = "";
    document.getElementById("materia").selectedIndex = 0;
  }

  