<?php
//Funcion para mostrar los errores, recorriendo un array
function mostrar_errores($errores)
{
    
    foreach ($errores as $error) {
    echo $error;
    }
}

//funcion para mostrar los valores de los campos del formulario
function mostrar_campo($campo)
{
    if (isset($_POST[$campo]))
        echo 'value="' . $_POST[$campo] . '"';
}

//funcion para comprobar el correo
function validad_email($str)
{
    return (false !== strpos($str, "@") && false !== strpos($str, "."));
}