// global.js
// resources/js/global.js
document.addEventListener('keydown', function(event) {
    if (event.key === 'F1') {
        // Prevenir el comportamiento predeterminado de F1
        event.preventDefault();

        // Abrir el PDF en una nueva pestaña
        window.open('/manual_usuario.pdf', '_blank');
    }
});

