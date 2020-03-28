window.onload = iniciar;

function iniciar(){
    document.getElementById("enviar").addEventListener("click",validarFormulario(),false);
}

function validarFormulario(botonPulsado){
    let errores = [];
    let camposOK;
    let mailOK;
    if(comprobarCamposVacios(errores)== true){
        camposOK = true;
    }else{
        camposOK = false;
    }
    
    if(validar_email(errores)==true){
        mailOK = true;
    }else{
        mailOK = false;
    }
    
    if(camposOK==true && mailOK==true){
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

function comprobarCamposVacios(errores){
    if(document.getElementById("nombre").value == ""){
       errores.push("Algun campo no ha sido rellenado"); 
       return false;
    }
    
    if(document.getElementById("apellidos").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    
    if(document.getElementById("domicilio").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    
    if(document.getElementById("poblacion").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    
    if(document.getElementById("email").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    
    if(document.getElementById("telefono").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    
    if(document.getElementById("observaciones").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    
    if(document.getElementById("peso").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    
    if(document.getElementById("altura").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    
    if(document.getElementById("edad").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    if(document.getElementById("actividad").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    if(document.getElementById("lesiones").value == ""){
       errores.push("Algun campo no ha sido rellenado");
       return false;
    }
    return true;
}

function validar_email(errores){
    let email= document.getElementById("email").value;
    let emailReal = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
       
    if(email == ""){ 
        return false;
        
    }else if(!emailReal.test(email)){ 
        errores.push("El correo no pertenece a un patron real");
        return false;
    }
    return true;
} 

function validar_telefono(errores){
    
    if(document.getElementById("telefono").value.length != 9){
        errores.push("El telefono debe contener 9 carateres");
        return false;
    }
}