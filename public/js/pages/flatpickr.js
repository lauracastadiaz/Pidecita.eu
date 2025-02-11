document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#diasNoDisponibles", {
        mode: "multiple",
        dateFormat: "Y-m-d",
        locale: "es" 
    });

    flatpickr("#diasExcepcionales", {
        mode: "multiple",
        dateFormat: "Y-m-d",
        locale: "es"
    });
});