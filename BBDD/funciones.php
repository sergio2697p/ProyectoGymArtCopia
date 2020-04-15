<?php
    //Funcion para mostrar los errores, recorriendo un array
    function mostrar_errores($errores){
        echo '<ul>';
        foreach ($errores as $error) {
            echo '<li>'.$error.'</li>';
        }
        echo '</ul>';
    }

    //funcion para mostrar los valores de los campos del formulario
    function mostrar_campo($campo){
        if(isset($_POST[$campo])) 
        echo 'value="'.$_POST[$campo].'"';
    }