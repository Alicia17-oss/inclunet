// cambiar color de fondo del header
window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Desplegar menú de login
function toggleDropdown() {
    const menu = document.getElementById("user-menu");
    menu.style.display = menu.style.display === "none" || menu.style.display === "" ? "block" : "none";
}

// Cierra el menú si haces clic fuera de él
window.onclick = function(event) {
    const dropdown = document.getElementById("user-menu");
    if (!event.target.closest('.login-icon')) {
        dropdown.style.display = "none";
    }
};


document.addEventListener("DOMContentLoaded", function() {
    const tipoUsuario = document.getElementById("tipo_usuario");
    const voluntarioFields = document.getElementById("voluntario-fields");
    const organizacionFields = document.getElementById("organizacion-fields");

    // Mostrar el formulario de voluntario por defecto
    voluntarioFields.style.display = "block";
    organizacionFields.style.display = "none";

    tipoUsuario.addEventListener("change", function() {
        if (tipoUsuario.value === "voluntario") {
            voluntarioFields.style.display = "block";
            organizacionFields.style.display = "none";
        } else if (tipoUsuario.value === "organizacion") {
            voluntarioFields.style.display = "none";
            organizacionFields.style.display = "block";
        }
    });
});


function joinEvent(button) {
    // Cambiar el texto del botón y deshabilitarlo
    button.textContent = "Te has unido al evento";
    button.disabled = true;

    // Opcional: Agregar una alerta o mensaje de confirmación
    alert("¡Te has unido al evento!");
}






