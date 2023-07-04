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
      case "opcion4":
      window.location.href = "Detalles_alumnos.html";
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
function editarCampos() {
// Habilitar la edición de los campos en los detalles del alumno
document.getElementById("nombre").readOnly = false;
document.getElementById("apellidos").readOnly = false;
document.getElementById("expediente").readOnly = false;
document.getElementById("materia").disabled = false;

// Función para editar un campo de la tabla
var camposTabla = document.getElementsByClassName("editable");
for (var i = 0; i < camposTabla.length; i++) {
    camposTabla[i].contentEditable = true;
    camposTabla[i].classList.add("editing");
}
}
function guardarCambios() {
// Obtener los valores editados de los campos en los detalles del alumno
var nombre = document.getElementById("nombre").value;
var apellidos = document.getElementById("apellidos").value;
var expediente = document.getElementById("expediente").value;
var carrera = document.getElementById("materia").value;

// Deshabilitar la edición de los campos en los detalles del alumno
document.getElementById("nombre").readOnly = true;
document.getElementById("apellidos").readOnly = true;
document.getElementById("expediente").readOnly = true;
document.getElementById("materia").disabled = true;

// Función para guardar los cambios en la tabla
var camposEditables = document.getElementsByClassName("editable");
  for (var i = 0; i < camposEditables.length; i++) {
    camposEditables[i].contentEditable = false;
    camposEditables[i].classList.remove("editing");
  }

}

function cancelarEdicion() {
// Descartar los cambios en los detalles del alumno y deshabilitar la edición
document.getElementById("nombre").readOnly = true;
document.getElementById("apellidos").readOnly = true;
document.getElementById("expediente").readOnly = true;
document.getElementById("materia").disabled = true;

// Función para cancelar la edición en la tabla
var camposEditables = document.getElementsByClassName("editable");
  for (var i = 0; i < camposEditables.length; i++) {
    camposEditables[i].contentEditable = false;
    camposEditables[i].classList.remove("editing");
  }
}
function redireccionar(url) {
  window.location.href = url;
}
