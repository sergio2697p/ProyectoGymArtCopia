window.onload = esperaFormulario;
function esperaFormulario() {
    document.getElementById("enviar").addEventListener("click", validar, false);
}

function validar(botonPulsado) {
    let errores = [];
    let nickOK;
    let emailOK;
    let contrasenaOK;
    if (validar_nick(errores)==true) {
         nickOK = true;
    } else {
         nickOK = false;
    }

    if (validar_email(errores)==true) {
        emailOK = true;
    } else {
        emailOK = false;
    }

    if (validar_contrasena(errores)==true) {
        contrasenaOK = true;
    } else {
        contrasenaOK = false;
    }

    if (nickOK==true && emailOK==true && contrasenaOK==true) {
        return true;
    }else{
        swal("Atencion!",mostrarErrores(errores) , "warning");
        botonPulsado.preventDefault();           
        return false;
    }
}

function mostrarErrores(errores) {
    let cadenaErrores = "";
    for (error of errores) {
        cadenaErrores += "-" + error + "\n";
    }
    return cadenaErrores;
}
function validar_nick(errores) {
    let nick = document.getElementById("nick").value;

    if (nick == "") {
        errores.push("El nick no puede estar vacio");
        return false;
    }
    return true;
}

function validar_email(errores) {
    let email = document.getElementById("email").value;
    let emailReal = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

    if (email == "") {
        errores.push("El correo esta vacio");
        return false;

    } else if (!emailReal.test(email)) {
        errores.push("El correo no pertenece a un patron real");
        return false;
    }
    return true;
}

function validar_contrasena(errores) {
    let contrasena1 = document.getElementById("contrasena1").value;
    let contrasena2 = document.getElementById("contrasena2").value;

    if (contrasena1 != contrasena2) {
        errores.push("Las contrasenas no coinciden");
        return false;
    }
    if (contrasena2 == "" || contrasena1 == "") {
        errores.push("Debes repetir la contrasena por motivos de seguridad");
        return false;
    }

    return true;
}