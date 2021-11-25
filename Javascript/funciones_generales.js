console.log("Esto es un archivo externo");

window.onload = function () {
    //esto se ejecuta cuando la página termina de cargar
    var nombre = prompt("Ingrese su nombre");
    var confirmar = confirm("¿Eres mayor de 18 años?");
    if (!confirmar) {
        window.location = "https://www.google.com.ar/";
    } else {
        alert(`Bienvenid@ ${nombre}.`);
    }
}