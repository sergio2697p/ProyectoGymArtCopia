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


// *Funciones Requeridas para los clientes*/
function maximoCodigoCliente($tabla,$codigo)
{
    $conexion = conectarUsuarios();
    //para insertar el nuevo id
    //buscar en la BD el mayor id(max)
    $sql = "SELECT MAX($codigo) FROM $tabla";
    $resultado = $conexion->query($sql);
    //hay que utilizar row porque no le hemos dado nombre a la columna seleccionada
    $fila = $resultado->fetch_row();
    $max_id = $fila[0];
    $nuevo_id = $max_id + 1;
    unset($conexion);
    return $nuevo_id;
}