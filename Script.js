
 const botonFormulario = document.getElementById("botonFormulario");
  const modal = document.getElementById("modalRegistro");

  // Mostrar modal al hacer clic en el carrito
  botonFormulario.addEventListener("click", () => {
    modal.style.display = "block";
  });

  // Mostrar modal al hacer clic en cualquier botón "Comprar"
  const botonesComprar = document.querySelectorAll(".producto button");
  botonesComprar.forEach(boton => {
    boton.addEventListener("click", () => {
      modal.style.display = "block";
    });
  });

  // Ocultar modal si se hace clic fuera del formulario
  window.addEventListener("click", function(event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });

  // Enviar formulario por AJAX (sin recargar)
  document.getElementById("formularioRegistro").addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("http://localhost/timekeeper/registro.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      alert(data);
      this.reset();
      modal.style.display = "none";
    })
    .catch(error => {
      alert("Error al registrar: " + error);
    });
  });

  // Scroll al inicio
  document.getElementById("botonInicio").addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

// Alternar visibilidad del menú
document.getElementById("botonMenu").addEventListener("click", () => {
  const menu = document.getElementById("menuDesplegable");
  menu.style.display = menu.style.display === "flex" ? "none" : "flex";
});

// Función para hacer scroll suave a secciones
function scrollToSection(id) {
  if (id === 'top') {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  } else {
    const seccion = document.getElementById(id);
    if (seccion) {
      seccion.scrollIntoView({ behavior: 'smooth' });
    }
  }

  // Cerrar el menú después de hacer clic
  document.getElementById("menuDesplegable").style.display = "none";
}


