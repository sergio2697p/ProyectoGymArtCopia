<?php
// function conectarUsuarios()
// {
//     try {
//         $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
//         $dsn = "mysql:host=localhost;dbname=art";
//         $art = new PDO($dsn, "root", "", $opc);
//     } catch (PDOException $e) {
//         die("Error:" . $e->getMessage());
//     }
// }

function conectarUsuarios() {
    $conexion=mysqli_connect("localhost","root","","art");
    $error=$conexion->connect_errno;

    if($error !=null) {
        echo "<p>Error $error conectando a la base de datos: $conexion->connect_errno</p>";
        exit();
    }else {
        mysqli_set_charset($conexion,"utf8");
        return $conexion;
    }
}
