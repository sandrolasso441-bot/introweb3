const form = document.getElementById('Formulario');

form.addEventListener('submit', function(e) {
    e.preventDefault();

    var nombres = document.getElementById("txtNombres").value;
    var apellidos = document.getElementById("txtApellidos").value;
    var correo = document.getElementById("txtCorreo").value;
    var edad = document.getElementById("txtEdad").value;

    document.getElementById("resultado").innerHTML = 
        "<table border='1' style='border-color: black; border-collapse: collapse;'>" +
            "<tr><td><b>Nombres:</b></td><td>" + nombres + "</td></tr>" +
            "<tr><td><b>Apellidos:</b></td><td>" + apellidos + "</td></tr>" +
            "<tr><td><b>Correo:</b></td><td>" + correo + "</td></tr>" +
            "<tr><td><b>Edad:</b></td><td>" + edad + " años</td></tr>" +
        "</table>";

    form.reset();
});


document.getElementById('btnTabla').addEventListener
    (
        'click', function(){

            const num = 3;
            let cadena = "";

            for (let index = 1; index <= 10; i++){
                //let res = num * i;
                //cadena += num + " * " + i + " = " + res + "<br/>";
                cadena += "<input type = 'text' value = 'HOLA'><br/">;
            }
            document.getElementById("resultado").innerHTML = cadena;
            
        }
    );