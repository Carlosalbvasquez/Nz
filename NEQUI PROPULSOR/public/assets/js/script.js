
function formatPhoneNumber() {
    // Obtén el valor actual del campo
    let phoneNumber = document.getElementById('j_username').value;

    // Elimina cualquier carácter que no sea un número
    phoneNumber = phoneNumber.replace(/\D/g, '');

    // Añade espacios en blanco para formatear el número
    phoneNumber = phoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, '$1 $2 $3');

    // Actualiza el valor del campo con el número formateado
    document.getElementById('j_username').value = phoneNumber;
}
