function confirmerValidation(id) {
    if (confirm) {
        document.getElementById('formValidation' + id).submit();
    }
}
function confirmerRejet(id) {
    if (confirm) {
        document.getElementById('Rejetform' + id).submit();
    }
}
